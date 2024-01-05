<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Accessary;

use App\Models\AccessaryType;

use App\Models\OrderDetail;

use App\Models\Supplier;

use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    private $date= [];

    private $orders;

    private $accessaries;

    private $accessaryTypes;

    private $suppliers;

    private $orderDetails;
    
    public function __construct()
    {
        $this->orders = new Order();
        $this->accessaries = new Accessary();
        $this->accessaryTypes = new AccessaryType();
        $this->suppliers = new Supplier();
        $this->orderDetails = new OrderDetail();
    }

    private function dateStringToArr($date) {
        return $arrCreatedDate = [
            'day'=>substr($date, 8, 2),
            'month'=>substr($date, 5, 2),
            'year'=>substr($date, 0, 4),
        ];
    }
    public function index(Request $request)
    {
        $filters = []; 
        $keywords = null;

        $suppliers = DB::select('SELECT * FROM SUPPLIER ');

        if ($request -> supplier) {
            $supplierId = $request->supplier;
            if ($supplierId > 0) {
                $filters[] = ['supplier.id', '=', $supplierId];
            }
           
            
        }

        if ($request -> keywords) {
            $keywords = $request->keywords;

        }

        $orderList = $this->orders->getAllOrders($filters, $keywords);

        return view("order.list", compact('orderList', 'suppliers'));
    }

    public function getAdd()
    {
      
        $supplierList = $this->suppliers->getAllSupplier([], "");

        $accessaryTypeList = $this->accessaryTypes->getAllAccessaryType();

        $accessaryList = $this->accessaries->getAllAccessary([], "");
        
        return view("order/add", compact('accessaryList', 'accessaryTypeList', 'supplierList'));
    }

    public function loadAccessary(Request $request) {

        
        $supplierId = $request->input('supplier');
        $typeId = $request->input('accessaryType');

        $dataSelect = [
            'typeId' => $typeId,
            'supplierId' => $supplierId
        ];

        $accessary = $this->accessaries->getAccessaryBySpAndTp($dataSelect);

        return response()->json($accessary);
    }

    public function updateAccessaryList(Request $request) {

        $accessaryId = $request->input('accessary');
        
        $accessary = $this->accessaries->getAllAccessaryById($accessaryId);

        return response()->json($accessary);
    }

    public function postAdd(Request $request)
    {

        $data = $request->all();

        $createdDate = Carbon::today();

        $orderDetails = array_slice($data, 4, null, true);

        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($orderDetails as $key=>$quantity)
        {
            $accessary = $this->accessaries->getAllAccessaryById($key);
            $price = $accessary[0]->price;

            $totalQuantity += $quantity;

            $totalPrice += $price * $quantity;

        }

        $dataOrderInsert = [
            'supplier_id' => $request->get('supplier'),
            'total_price' => $totalPrice,
            'total_quantity' => $totalQuantity,
            'created_at' => $createdDate
            ];  

        $this->orders->addOrder($dataOrderInsert);

        $lastOrder = $this->orders->getLastOrder();
        $lastOrder = $lastOrder[0];
        $lastOrderId = $lastOrder->id;

        foreach ($orderDetails as $key=>$quantity) {
            $accessary = $this->accessaries->getAllAccessaryById($key);
            $price = $accessary[0]->price;
            $dataOrderDetailInsert = [
                'accessary_id' => $key,
                'quantity' => $quantity,
                'price' => $price * $quantity,
                'order_id' => $lastOrderId,
            ];

            $curQuantity = $this->accessaries->getQuantity($key);

            $updatedQuantity = intval($quantity) + $curQuantity[0]->QUANTITY;

            $this->accessaries->updateQuantity($key, $updatedQuantity);

            $this->orderDetails->addOrderDetail($dataOrderDetailInsert);
            
        }

        return redirect()->route('order.index')->with('status', 'Thêm đơn hàng thành công');
    }

    public function delete($id=0) {

        if (!empty($id)) {

            $orderDetail = $this->orders->getDetail($id);

            if (!empty($orderDetail)) {
                $deleteDetailStatus = $this->orderDetails->deleteOrderDetailByOrderId($id);
                $deleteOrderStatus = $this->orders->deleteOrder($id);


                if ($deleteDetailStatus ||  $deleteOrderStatus) {
                    $msg = 'Xóa dữ liệu thành công';
                } else {
                    $msg = 'Không thể xoá dữ liệu, vui lòng thử lại sau';
                }
            } else {
                $msg = 'Đơn hàng đã chọn không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }

        return redirect()->route('order.index')->with('status', $msg);
    }

    public function getEdit($id = 0)
    {
        if (!empty($id)) {
            $orderDetail = $this->orders->getDetail($id);
            $orderDetailList = $this->orderDetails->getAllOrderDetailByOrderId($id);
            // dd($orderDetailList);
            if (!empty($orderDetail[0])) {
                $orderDetail = $orderDetail[0];

                $importDateString = $this->dateStringToArr($orderDetail->created_at);
                
                $orderDetailList = $this->orderDetails->getAllOrderDetailByOrderId($id);

                $supplierName = $orderDetail->supplier_name;
            } else {
                return redirect()->route('order.index')->with('status', 'Đơn hàng đã chọn không tồn tại');
            }
        } else {
            return redirect()->route('order.index')->with('status', 'Liên kết không tồn tại');
        }

        return view("order.detail", compact('orderDetail', 'importDateString', 'orderDetailList', 'supplierName'));
    }

    
    
}
