@extends('layouts.app')
@section('content')

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="/css/layout.css">
    <span style="font-family: verdana, geneva, sans-serif;">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12-lg">

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="dashboard-container">
                    <nav class="side-menu">
                        <ul>
                            <li><a href="#" class="logo">
                                    <img src="/logo.png" alt="">
                                    <span class="nav-item">DashBoard</span>
                                </a></li>
                            <li><a href="">
                                    <i class="fas fa-tasks"></i>
                                    <span class="nav-item">Job card</span>
                                </a></li>
                            <li><a href="#">
                                    <i class="fas fa-home"></i>
                                    <span class="nav-item">Hóa đơn</span>
                                </a></li>
                            <li><a href="">
                                    <i class="fas fa-user"></i>
                                    <span class="nav-item">Khách hàng</span>
                                </a></li>
                            <li><a href=" {{ route('booking.index') }} ">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span class="nav-item">Lịch hẹn</span>
                                </a></li>
                            <li><a href="">
                                    <i class="fas fa-chart-bar"></i>
                                    <span class="nav-item">Thống kê</span>
                                </a></li>
                            <li><a href="">
                                    <i class="fas fa-cog"></i>
                                    <span class="nav-item">Phụ tùng</span>
                                </a></li>
                            <li><a href="">
                                    <i class="fas fa-car-alt"></i>
                                    <span class="nav-item">Xe</span>
                                </a></li>
                            <li><a href="#">
                                    <i class="fas fa-user-tie	"></i>
                                    <span class="nav-item">Nhà cung cấp</span>
                                </a></li>
                            <li><a href=" {{route('employee.index')}}">
                                    <i class="fas fa-id-badge"></i>
                                    <span class="nav-item">Nhân viên</span>
                                </a></li>
                            <li><a href=" {{route('order.index')}}">
                                    <i class="fas fa-id-badge"></i>
                                    <span class="nav-item">Đơn hàng</span>
                                </a></li>
                            <li><a href="" class="logout">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span class="nav-item">Log out</span>
                                </a></li>
                        </ul>
                    </nav>

                    <section class="main">
                        <div class="main-top">
                            <h1>Chi tiết nhân viên</h1>
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="main-skills">


                            <form action="" class="content row" method="POST">
                                @csrf
                                @csrf
                                @if (session('msg'))
                                <div class="alert alert-success text-center">{{session('msg')}}</div>
                                @endif

                                <div class="col-3 row infogroup-container">
                                    <div class="col-md-8 mb-3">
                                        <a href="{{route('employee.index')}}" class="btn-close" aria-label="Close"></a>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <button type="submit" class="btn btn-light"><i class="far fa-edit"></i></button>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBISEhQRERUREhESERIREREREREPEREQGBQaGRgUGBgcIS4lHB4rHxgYJjgmKy8xNTU1GiQ7QDs0Py40NTEBDAwMEA8QGhIRGDQhGCExNDExMTQ0MTExNDQ0MTQ0NDQxMTQ0MTQ0NDQ0MTQxMTE0NDE0NDQxMTQ/NDE6NDE/P//AABEIALcBEwMBIgACEQEDEQH/xAAcAAACAgMBAQAAAAAAAAAAAAAEBQADAQIGBwj/xABDEAACAQMCAgcECAMFCAMAAAABAgADBBESIQUxEyJBUWFxkQYygbEHI0JScqGiwRSC4TNikrLCU2Nzk9HS8PEWJDT/xAAZAQADAQEBAAAAAAAAAAAAAAAAAQIDBAX/xAAhEQEBAAICAwACAwAAAAAAAAAAAQIRITEDEkEiMgRRYf/aAAwDAQACEQMRAD8AUoYShgiy1DADkIlqmBo0vV4tGa2d2VO86KyugZxaPDba6KnnHKVd1TwZcEiPhvEg2ATH1BwwlJ0mmB1kzUXwBjTTAtGah8FgbGiZCS7RNtEAFqp7g/viEhJq6ddB5n8oSEgAzpN9G0sZd5sV2gA6pMlJcqzOIBVpkCS7EziADlJqUhGJgrAKOjk6OEaJgrAKOjldVNoXplVZdoAnrJvDeHptBqw3jDh67Sfqr01rpF9dI1rrF9dY0kt0kQXtPnOluliK9WI3L3qc4DwxfrhGl8vOA8LT64SarHt1+mSbhZiS305lVlirNlWWKs0cyLLVmVSX06WYgpEuQy42016IiBr6DYOQZ0HDOJFcBuXfOdpJGdsm0NjTt7a4VxkGU0VzUc+QiG1qvTOVPwjTht+hJVzhyc78o9lYZaZAstxJplEp0/WDwUn1l+JWi9dvBQJfiIKCN5s3KQDec57Y8ftrek9Go4FapTbRT3JOTpye7f5QBvcX9KmjuXTqLqIDAkDxAnN3vt3b086FaoUZg2MKCVPIEnt755VcVFSorFmDNyI2GCDjfuio11fUWLJqzkqTgk+Hr2wPT3C39ubV1Rjtrd0ZVJd0cctgOsD3jM6inUVgGUgg9s+Zbi8JVKaEnQDufeZvvefOOfZ72ruLZqeXaqKaMEpOzCihIOCQOZGfz8jDY0+hMTGIFwS/FxbUa2QTUpqxIGkFsdbA88w/EZMASETcCQiAV6ZXXG0IxKLgRApqjeMbBerAanOMrEdWTO13piusX11jOsIvriUgouREV6vOdBciI74RG5i/EA4WPrhGV+IFwofWyb0rHt1mZJrmSZukiUS5FmqrCESbORFSHWyQcLCaAMQGLT2mGt5shMtVj3QAYW+IbbpiZBEtpsIHKIRIK6bw1GGJUBJUKsL2om2dS/dbs8j2R5bXSVB1dj2qdj/WIqabS6mmNxkSpU08ojdj4gegluIss7wrkNvvnPbGS1FYbGUkJe1hTp1KhBYIjOVXZiAMkDxng3GWFzUZixdRUcqXYFwNR0qT2gftPdeNUi9rXVSATRqYJGoe6eyeNcH4DUrkuowCSdTbDbnvyit0rGbpK9hWuHzSR6mNgEB2x5Qn/wCB3pXVpVRsd2wR8J7L7P8ADadtQVQoDHdiO1u/M24pcgKcSLlw0xxlung1f2SuqedlJHcflEtejUpth1ZTnt2nr17U3JnLcRppUyjAduD4zLHy3fLfLwyTgd9FvtAiXC0a2uo7A06Ls46O3pk6mVQTsWYDOOe09sE8D+jTgDVeJKH9y2VqrnkTghUX4ls/yme+gTol4ceU1UAmTJJGTGJRc8oTBrrlAFj84zsR1fhFjCNrMdUSZ20ynESsIBXEY1RAK4lMym5ERXonQXIiO9EA5e/HOK7SppqZji/HOIn2f4yMuj3rl1SXAwN5InSvsOcky2294NRYTTSaokJRZuxYCwy3pyhF3jG2pQDKpLVSWCnNlSBNVSWBJsFmwWAaaZsHEy/L4zIWI9rUrL5QunUB5EH45i4rMaO3+kYNKIEu5cjAEqES0XEAOW6CqekICgbsxAUDxM4ng9EAlMZ6PIzrLocnOVA6oBznbvjj2gQVLZ1I1Lqpsy/fVXDafI4xFXCrg9GHZUQ1OsqINKon2RjyMxzy59XR4cOPY6uuLlF0U6Zquo62G0KPAHB3nL3PtHUqPoei9McveVwPTeW8e4TWZekpvU0jOEQAYJB3JPM53z4TlOG8PrGoihX2P1jli2rrZ1Y5A42k5bsaY8ZbkOqhzliRjE52+uqYP28feFNyPXEc+1KPRZEQDroDuebd05m5q1gzdYnloXSAGO2rVk7D3uWeQ8cZ4488tc8utPS/ortF03NwMHpGpIDv9hWY/wCcT0HE436M3/8Aq1W5K1wSqYwV+rp5z8czswwnXj+scGf7VMSYmQZmUliCXXKGQaumYhCwrGtqOqIA1Boxt1wsidryvCVIBWh9SA1hNGZXciI70R9cRJeiAczfjnOdumwczpr8c5zN+OcjLoXpT/FyQLMkyRr/AF6EiQhFmqLL1WbtGKS7xxbJFluvWju2TaOBNEzol2mZCwJRpmwWXaZNMAGddwPGWFJkL1hCGSIBNMyV2l5SY0cvMRhCkxphRpzTRvAB61LUpXvG3bg9h9Zzz0KlN2aoFAJBVlwNRxlzjJ+0Tv2zrTTif2loE0dY+wet4Kds+uJl5Mdzf1t4s7Lr5S2rx/o0KgLjGMnnFvDeK0zUarVfo1GBT6pIfPvEzmuKI5KBTnntnYnGxjew4dVqURlEySFxrbZt8dbAA5dveJhJe9uu2daEe1d1TrsjpgKAoDEgnGOfjtFVJlemThdQ2PeD4SvivAqlFNdQ9HjWQOlRi2k8lHaTmKuHGo9RdOrLYUKcamJPVBx28/WL1t+j2k+PTPYdHpW7kggVKpdfFdCjPqDOmS7g9vbaERByRFT0GMy3oZ2YzUkcGV3laIW8lq3YgRozApGUkw/ihMdMDATSOJooIipw1Bl1PlFgqnvjK3PVEmHZpKkBrQ54FWlJLLiJrwR1Xie8gHN345zlOKtjedbfds5DjrYWTl0MuinpJIB08ky9WXL2NBLwNpWgl2Nps2Ztl3ju3XaKbMbx1RG0cJYBMhZkCbARhrpkKzfEyREFCL1/hLysroDrtCMQCnTIE6y+ctxMoh1A4OACSRvANys1CbyfxC9hzg4+ImvTiMLWSL+Nri2q+Kjbw1DMIe6xjvJAEsukFRGXsZWB8iMRWcCXVeSMv1mD2GGNc1KYyueWMqeyC31Ih2Q++jFTjYqQef7/ABgq3VRcg4PZvkTitejj/be9vDUGHGT5D89o49gKFB7h3c9emQqL9kORzJ78Yx/Scxc3LnYAL3kbmG+xZ+suB40z+n+kvxXln5rdPaQk3FOcpb8YqqAuonGwzg7Rna8Zc+8Afhj5Tq24zg05BTg1LiKN2Qj+JTq7+8cDzjJGp7QWqsYOIDWG8m9Kx7U5je290RTiNrb3RJismXgVaGPA600Zl1eJryOa8TXkQc9fds4z2iHVnZ33bOT4ymoYk5dCuR6IyR2luMCZmXtU+tepIJa3KVpN6nKbrEWYjmmNooshG6RwqtWbiaLLBAMgSMJkTDQCq1G7HxhBEptB1Se8mEYhAxiFUiFAB+3nfx7vSUIuSB3nE3vhgZHYBkDngbgjxHyzAE7dSq6nk2WH4hsf2m77YbsIlfEW1FXHeM47jt+8utzrpkdo3gFLtqZMdhJPkFP74jGgcoPKI61HpDoyVPMMDpZSPtDxjS2JVFBOogYY405PfiAcB7YW5pXS1F9yupDDs1oRv8QR/hitkDDxnae2duGpJU/2dZPRgUx6sPSco1PBnD5sdZO/+PlvEnr0tzD/AGMo4rXH4aZ/zj9pa1vmHezCKLh05F6WfPSw/wC6Hhv5aPzz8TsJL6AIyPjCP4fumq0ioZm5kjlyAzsBOtwCKAxNrup1SOWACPzm9JYDxGrgso+6v5lpW+A6Th10alNWPvAAN47bGa1DvEnDq5SsiA9U01Vx4ncH4Zjis2DJt4VjOWSIyt/dEUdJG1ueqIQ8kqGB1TCqhgdWWzA14nvI3uDE92Yg5++7Yle315jm+7ZVwunqDScul481zT25BI7vCSP6tt1j5yTLSvV0KTaoZoky53m7IfZCNUiuzjNDHAuWbiVqZupgFizWodj5TKyu5PVPlAN7UdQS8SqgOqPKWiAX2i9bPcINf1cHbs+XfDbdcKWPbjEV8RPPP9fMQBY9UBih91ush+OSv7+sv4e2KjJ4GI+KXBRDn3ky9Nu1io1FcfewOXbHdmc3GewjPqIoK1uEwQw5q2f/AD4Z9YSj7eYzJcLz+Mopnl4ZHp/7/KAB+1Nqa1ncUxnLUn094cDKkfECeL2HtVXQAOFqp3sSrgeLDOfSe7191IPIjE+cr636OtVp4x0dWondsjlR8pOWMy7i8csseq632g481NaLUNLrXoLVDuCNLZKsmkHfBGM5+EG9g+J1G4nTao2TVSpSHYBldQAHZuogl1xF61gqFVxRq0KbEFzpQU2FNlUnCFusGKgaiFzF3ALnory3f7txSJ2z1SwDfpJixxxx6h5Z5Zd17+gzM3KdQ/D5iZpjBImb7+zY92n/ADCWzV0W2/KK79h065OAyr6KSSfzjB6gDEdsT8UfNenpGeo2o45bjb5ekm1UWmscu42YnSD3E429B8p0iVekRX+8oPx7Zzb0cDJ5nJC88EnJJ8Y14LVzT0n7DEfA7/uYqePZgBG9D3YqUiNaXuwh5NKhglUwmqYHWM0ZgbgxRdmNbgxPdGIEd9Jwbk3xmL2Y4Udm+MnLpph2xWPWPnJJUQ5MkybaNlMjHeaoZgHrTdym1nGKmLbOMFMZVepm6mUqZapga4Si6PV+IH5y0GUXJ90d7CAF0+Q8pugJOBzM0EKslyS3dsPOAEONKgc8DGIiv6g3yV8l3xGl4/fv4chOfvn7ofAQ+0BBoVCc46NmyNmUgbMO4jnnwnRcKGait/uwf0ic/wAQfCN+Ftu/blHPBqmFU91JB64EWIplcDrQfkTjtGR5j+mfSEXQ3HlBq5xg9258owjNtPDPbmh0fEbgYwGZXHiGRSf1ap7cw3I7p5H9KVHTeo/36C+qsw/cSThFwYlkuaQ3D2rOB3vRZXX9IeKmJ5jmORG2/YYx9n6oW7oFvdNQU2/DUBQ/kxgNakUdkPNHZCe3KkqflA30RZVhUVKg5VKaVB/MoP7y7iZ+pf8ABEnsbX12Nox5iglM9u6dT/THfEQOhf8ADGkuuTgh/vAZ9IpuR9cjZ26/rt/0jauwKqO4RJxPANLc/wBpjAJGrqNtt2dvwmd7X8NqrbbDJxyG5/p8ZtwZ8VGBYZZfdHIAdnidzNUt10jJJ8BsB8BKiejdHXfS2cdpHaPSOwpXSqY2o+7AKSK6q67qwDKfAjMPUYEeMPLLauqYDWMMqmAVjLQBuTFN0YyuGiq5MQJ7ztk4QcBvjJdds14apOceMnJeF1V7sMmSYei2TMyNNvYYpmqHrTUNtNaJ3mrmOrUw1GgFsdoUjRlRStLVMGVpYrQIQGlNY5dB4mbhpRqzUHgpgowBjSmuhQPDfziy2Gp1HiPTnGNw+BAoXXtSILx4wv7gb7iIbmtnMWVORm2tDXqLT7MF28hyHqRC+DPmn8EEZ+ydt1HrN9ptC/hXmfU/lFHCThDnYlyfIdkMRT+ueUFuNx6y1nyBB6zbR0ooV9gfNT5jl+WJ5j9K39pbt/dqr+pTPRS+Gcd4DDzGx+Y9J5z9KRz/AA58anySTe1RwisQQRsQQQe4jkYy9omBuXce7VFOuuNv7Wmrn9TN6RUDGnFgWpWlTlqtjT/5VZ0H6dMDenfRhch7BUzk0q1RDv2MQ4/zTsOJP9S/4Z5b9E97ipcUCffRKqjxRtLH0dfSejcTqYov5D5x3pP0K9UBfGIeL1t6J/3n+lobd1wAPKJOKvkUf+L81aZrdlbPlR5CUXIzNbB8oPKb15aTv2ZutVIoedNiP5TuP3Hwj3VtOG4HcGncaeyopX+Ybj5H1naI/VjhK6rQGs0KrNF9ZowCuWiq5MPuWi24aIFtyYTwVlCknxgdwYAbooCAcZk5KxdMbtO8STinvDk9aYgbqi+0zbtvBmfabWr7ykH1u20JV4DSfaXq8aRivLFeBq8tV4AWHlNJs1GPcoExrlFs/Wc+OIKdBww9cnuUn9pRf8RpkhVDVC2dIBIV8c9ON2HiBgd8Fpoan1ecIxXpB95BklfIkAHwl9JQjPU+25wp+6i7Ko7gB2eMICisruxHRogBwTqdjn7owcE+XLtxyi7iVjWUKyU1bfrKHOsDvGdvhOlTHPt5DwEjkQs2NrEcU6VOghBKoAxU5GTuT6kxAp0O69zn5xpnSdQxn8jFd/TYuXUZyNwOYPfiOTQHrWGB5TDvz8os6btzsNpYa8KUatknV2Z0+u37zzv6T6n/AOcf8T/TPQK1QFGA542855p9J1TNSgP7lRv8RUyLOlRx5Pb2RteOjWVsNSF6dW5UoHBqKjFHBK9gzq384jVseU3J7uUDdD7EX/Q39Ak4DsaTdmzjA/Vpnr/G6mLdx+EfrE8Ap1SrK67MrBgf7wORPaOIcTWpZLWGMVBRbx3YHHrD4X0HftyPgIhuOIAuiHmHB/Iw2+vQVAB3i6jwKpcVEqJ1ArAl2Bww7cDtkyHa7PhVfKgeENd89o/xCA2fDlpqASW23Lb5+HKWVWpgYwBju2+UvSdtHr9HUR9xodX8wDuPSegq4K7cp5Vd3ABwoCoeenYqfEHZl8J3ns/ddJa02znCBD5r1T8ooY+s8ArvCKzwCu8ogdw8W12hdw8XVnioCVzznL8XrFW2nSVW5zleN1VVt5ORwmeu2TuZJUblZJKnoz1NpfZtJJNEG9N5erySRpWK8tR5iSAWF4PZPsx72MkkFGNrcaT4EETa4us8vKZkjKNBXxvNDc5kkgbVq8yNR5YkkgAV7SQHrsoPgrZ9QIJ0TEHQc92dpJIAFa06jVGVuqVGSCQRufCef/SWpW7SnnOm3pn+Zic/ISSRXofXHyAySSTW06ZYhVGSTgDYbk7c56xwLgFT+DW2um0hX1gU2BYJnUFJII5k8sySSoVM6PA7ZDkKzkHbpDrA8hsPWFG7QdmPIESSQAO5vsRVcXZMxJJpwJrLEAcycDzM9J4RbLRorTXJxksT2uTkmSSLE6srPAK7ySS0lld4BVaSSIBHacR7TH6ySSKnHP5kkkiU/9k=" class="img-thumbnail" alt="...">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <p class="text-center">{{$employeeDetail->first_name}} {{$employeeDetail->last_name}}</p>
                                    </div>



                                    <div class="col-12 mb-3">
                                        <label for="inputId" class="form-label">ID</label>
                                        <input type="email" readonly class="form-control" id="inputId" name="employee_id" value="{{ old('employee_id') ?? $employeeDetail->employee_id }}">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="inputDepartment" class="form-label">Bộ phận</label>
                                        <select class="form-select" id="employee_department" name="employee_department" aria-label="Default select example">
                                            <option selected value="{{$employeeDetail->department_id}}">{{$employeeDetail->department_name}}</option>
                                            @foreach ($departmentList as $key)
                                            <option value="{{$key->id}}">{{$key->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-12 mb-3">
                                        <label for="inputPosition" class="form-label">Vị trí</label>
                                        <select class="form-select" id="employee_position" name="employee_position" aria-label="Default select example">
                                            <option selected value="{{$employeeDetail->position_id}}">{{$employeeDetail->position_name}}</option>

                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3"><br></div>

                                    <a type="button" onclick="return confirm('Bạn có chắc chắn muốn xoá dữ liệu nhân viên này không')" href="{{route('employee.delete',['id'=>$employeeDetail->employee_id])}}" class="btn btn-light"><i class="fas fa-user-times"></i></a>
                                    <div class="col-md-12">

                                    </div>


                                </div>

                             

                                <div class="col row">

                                    <div class="col-12">
                                        <h3 class="col-12 mb-3 content-header content-header">Thông tin cá nhân</h3>

                                        <div class="infogroup-container row">

                                            <div class="col-md-6 mb-3">
                                                <label for="inputFirstname" class="form-label">Họ</label>
                                                <input type="text" class="form-control" id="inputFirstname" name="employee_firstname" value="{{ old('employee_firstname') ?? $employeeDetail->first_name }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputLastname" class="form-label">Tên và tên đệm</label>
                                                <input type="text" class="form-control" id="inputLastname" name="employee_lastname" value="{{ old('employee_lastname') ?? $employeeDetail->last_name }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputAddress" class="form-label">Giới tính</label>
                                                <select class="form-select" name="employee_gender" aria-label="Default select example">
                                                    <option selected value="{{$employeeDetail->gender}}">{{$employeeDetail->gender}}</option>
                                                    <option value="Nam">Nam</option>
                                                    <option value="Nữ">Nữ</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputBirthdate" class="form-label">Ngày sinh</label>
                                                <input type="date" class="form-control" id="inputBirthdate" name="employee_birthdate" value="{{ old('employee_birthdate') ?? $employeeDetail->birthdate }}">
                                            </div>

                                        </div>


                                    </div>

                                    <div class="col-12">

                                        <h3 class="col-12 mb-3 content-header">Thông tin liên hệ</h3>

                                        <div class="infogroup-container row">
                                            <div class="col-md-12 mb-3">
                                                <label for="inputEmail" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="inputEmail" name="employee_email" value="{{ old('employee_email') ?? $employeeDetail->email }}">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="inputPhonenumber" class="form-label">Số điện thoại</label>
                                                <input type="text" class="form-control" id="inputPhonenumber" name="employee_phonenumber" value="{{ old('employee_phonenumber') ?? $employeeDetail->phone_number }}">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="inputAddress" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="inputAddress" name="employee_address" value="{{ old('employee_address') ?? $employeeDetail->address}}">
                                            </div>
                                        </div>



                                    </div>


                                </div>




                            </form>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- page content -->

@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#employee_department').on('change', function() {
            var departmentId = $(this).val();

            //console.log('event onchange');
            $.ajax({
                url: '/employee/get-positions/' + departmentId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#employee_position').empty();
                    $.each(data, function(key, value) {
                        $('#employee_position').append('<option value="' + value.id + '">' + value.position_name + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection