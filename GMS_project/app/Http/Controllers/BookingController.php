<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\BookingStatus;
use App\Models\ServiceType;

use function PHPUnit\Framework\isEmpty;

class BookingController extends Controller
{

    public $data = [];
    private $bookings;

    private $bookingStatuses;
    private $serviceTypes;
    private $buttonUpdateDisplays = [];

    public function __construct()
    {
        $this->bookingStatuses = new BookingStatus();
        $this->bookings = new Booking();
        $this->serviceTypes = new ServiceType();
    }
    public function index(Request $request) {

        $filters = []; 
        $keywords = null;

        $bookingStatuses = $this->bookingStatuses->getAll();
        
        

        if ($request -> status) {
            $statusId = $request->status;
            if ($statusId > 0) {
                $filters[] = ['booking.status_id', '=', $statusId];
            }
            
        }

        if ($request -> keywords) {
            $keywords = $request->keywords;
        }

        $bookingList = $this->bookings->getAllBooking($filters, $keywords);
       
        return view("booking/list", compact('bookingList', 'bookingStatuses'));
    }

    private function dateStringToArr($date) {
        return $arrCreatedDate = [
            'day'=>substr($date, 8, 2),
            'month'=>substr($date, 5, 2),
            'year'=>substr($date, 0, 4),
        ];
    }

    private function timeStringToArr($time) {
        return $arrCreatedDate = [
            'minute'=>substr($time, 3, 2),
            'hour'=>substr($time, 0, 2),
        ];
    }

    public function getDetail($id) {
        if (!empty($id)) {

            $buttonUpdateDisplays = [
                '',
                'Xác nhận',
                'Bắt đầu dịch vụ',
                'Hoàn thành'
            ];

            $bookingDetail = $this->bookings->getDetail($id);
            
            $bookingStatus = $bookingDetail[0]->status_id;

            if ($bookingStatus > 0 && $bookingStatus < 4 ) {
                $buttonDisplay = $buttonUpdateDisplays[$bookingStatus];
            } else {
                $buttonDisplay = '';
            }

            $createdDate = $bookingDetail[0]->booking_created;

            $createdDate = $this->dateStringToArr($createdDate);

            $bookingDate = $this->dateStringToArr($bookingDetail[0]->date);

            $bookingTime = $this->timeStringToArr($bookingDetail[0]->time);

            if (!empty($bookingDetail[0])) {
                $bookingDetail = $bookingDetail[0];
            } else {
                return redirect()->route('employee.index')->with('msg, Lịch hẹn đã chọn không tồn tại');
            }
        } else {
            return redirect()->route('employee.index')->with('msg', 'Liên kết không tồn tại');
        }

        return view('booking.detail', compact('bookingDetail' , 'createdDate', 'bookingDate', 'buttonDisplay', 'bookingTime'));
    }

    public function updateStatus($id) {
        if (!empty($id)) {
            
            $bookingDetail = $this->bookings->getDetail($id);

            $bookingStatus = $bookingDetail[0]->status_id;

            if ($bookingStatus > 0 && $bookingStatus < 4 ) {
                $this->bookings->updateStatus($bookingStatus+1, $id);
            }

            if (!empty($bookingDetail[0])) {
                $bookingDetail = $bookingDetail[0];
            } else {
                return redirect()->route('booking.index')->with('msg, Lịch hẹn đã chọn không tồn tại');
            }
        } else {
            return redirect()->route('booking.index')->with('msg', 'Liên kết không tồn tại');
        }

        return redirect()->route('booking.index')->with('msg', 'Cập nhật trạng thái thành công');
    }

    public function Cancel($id) {
        $this->bookings->updateStatus(6, $id);
        return redirect()->route('booking.index')->with('msg', 'Từ chối lịch hẹn thành công');
    }

    public function getAdd() {
        $serviceTypeList = $this->serviceTypes->getAllServiceTypes();
        $bookingHours = [
            '07:30',
            '08:00',
            '08:30',
            '09:00',
            '09:30',
            '10:00',
            '10:30',
            '11:00',
            '11:30',
            '13:00',
            '13:30',
            '14:00',
            '14:30',
            '15:00',
            '15:30',
            '16:00',
            '16:30',
            '17:00'
        ];

        return view("customer_booking", compact('bookingHours', 'serviceTypeList'));
    }

    public function postAdd(BookingRequest $request ){
       
        $createdDate = Carbon::today();

        $createdDate = substr($createdDate, 0, 10);

        $lastBooking = $this->bookings->getLastBooking();

        

        if (!empty($lastBooking)) {

            $lastBooking = $lastBooking[0];

            $lastBookingNumber = $lastBooking->id;

            $lastBookingNumber = intval($lastBookingNumber) % 10000;

            $lastBookingDate = $lastBooking->created_at;
            

            if ($lastBookingDate == $createdDate) {

            $autoIncrementPart = str_pad($lastBookingNumber + 1, 4, '0', STR_PAD_LEFT);
            } else {
            $autoIncrementPart = str_pad(0, 4, '0', STR_PAD_LEFT);
            }
        } else {
            $autoIncrementPart = str_pad(0, 4, '0', STR_PAD_LEFT);
        }
        
        $createdDateString = $this->dateStringToArr($createdDate);

        $autoId = substr($createdDateString['year'] , 2, 4) .  $createdDateString['month'] . $createdDateString['day'] . $autoIncrementPart;

        $dataInsert = [
            'booking_id' => $autoId,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'booking_created' => $createdDate,
            'type_id' => $request->service_type,
            'booking_note' => $request->booking_note,
            'customer_id' => 2,
            'status_id' => 1,
            'car_id' =>2
        ];

        $this->bookings->addBooking($dataInsert);
        return redirect()->route('customercp.booking.getAdd')->with('msg', 'Đặt lịch hẹn thành công');
    }
}
