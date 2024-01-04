
@extends('home')
@section('main-content')
<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Dashboard</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
      <link rel="stylesheet" href="/css/dashboard.css">
      <span style="font-family: verdana, geneva, sans-serif;">
    </head>
    <body>
      
          <div class="main-top">
            <h1>Shortcuts</h1>
            <i class="fas fa-user-cog"></i>
          </div>
          <div class="main-skills">
            <div class="card">
              <i class="fas fa-clipboard-check"></i>
              <h3 id = "job-complete-txt">20</h3>
              <p>Complete Job</p>
              <button>See details ></button>
            </div>
            <div class="card">
              <i class="fas fa-car-side"></i>
              <h3 id="total-vehicles-txt">30</h3>
              <p>Total Vehicles</p>
              <button>See details ></button>
            </div>
            <div class="card">
              <i class="fas fa-calendar"></i>
              <h3>2</h3>
              <p>Today Booking</p>
              <button>See details ></button>
            </div>
            <div class="card">
              <i class="fas fa-dollar-sign"></i>
              <h3>245</h3>
              <p>Total Sale</p>
              <button>See details ></button>
            </div>
          </div>
    
          
    </body>
    </html></span>
    @endsection