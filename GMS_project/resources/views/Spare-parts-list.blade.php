<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spare parts list</title>
</head>
<link rel="stylesheet" href="../css/Spare-parts-list.css" />
<body>
    <!--
    <body style="background-image: linear-gradient(to right, rgb(104, 222, 19), rgb(217, 255, 0)); 
            background-repeat: no-repeat; 
            background-attachment:fixed">-->
            <div class="x_content">
        <ul class="nav nav-tabs bar_tabs" role="tablist">
            <div class="container overflow-hidden">
                <div class="row gx-5">
                    <div class="col">
                        <div class="p-3">
                            <h2>Danh sách nhân viên</h2>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Tìm nhân viên" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Tìm</button>
                            </form>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <button type="button" class="btn btn-info">+ Thêm nhân viên</button>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </div>
    <div class="search-bar">
        <table>
            <tr>
                <td>
                    <h3>Danh sách phụ tùng</h3>
                </td>
                <td>
                    <input type="text" style="width: 70%;" type="text" id="txtphutung" name="txtphutung" required />
                </td>
            </tr>
        
</table>
    </div>
    <div>
    <table cellpadding="3px" align="center" width="100%" class="spare-part-list">
        <tr class="title">
            <th>Mã phụ tùng</th> <th>Tên phụ tùng</th> <th>Loại</th> <th>NCC</th> <th>Ngày nhập</th> <th>Giá</th> <th>SL</th> <th></th>
        </tr>
        <tr class="odd-line">
            <td>abc</td> <td>abc</td> <td>abc</td> <td>abc</td> <td>1/1/1</td> <td>123$</td> <td>12</td> <td>...</td>
        </tr>
        <tr class="even-line">
        <td>abc</td> <td>abc</td> <td>abc</td> <td>abc</td> <td>1/1/1</td> <td>123$</td> <td>12</td> <td>...</td>
        </tr>
        <tr class="odd-line">
        <td>abc</td> <td>abc</td> <td>abc</td> <td>abc</td> <td>1/1/1</td> <td>123$</td> <td>12</td> <td>...</td>
        </tr>
    </table>
    </div>
</body>
</html>