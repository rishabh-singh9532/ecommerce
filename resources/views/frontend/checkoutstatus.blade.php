<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            margin-top: 0;
        }

        #confirmation-message {
            margin-top: 20px;
        }

        #image-circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            margin: 20px auto;
        }

        #image-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #button-container {
            margin-top: 30px;
        }

        .action-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            margin: 0 10px;
            text-decoration: none;
            color: white;
        }

        #go-to-shopping {
            background-color: #4CAF50;
        }

        #check-order {
            background-color: #3498db;
        }
    </style>
</head>

<body>
    <h1>Order Placed Successfully!</h1>

    <div id="confirmation-message">
        <p>Your order has been placed successfully.</p>
    </div>

    <div id="image-circle">
        <img src="{{asset('uploads/order/1.png')}}" alt="Order Confirmation Image">
    </div>

    <div id="button-container">
        <a href="{{url('/')}}" id="go-to-shopping" class="action-button">Go to Shopping</a>
        <a href="{{url('dashboard')}}" id="check-order" class="action-button">Check Order</a>
    </div>
</body>
<!-- <script>
        setTimeout(function () {
            window.location.href = "/";
        }, 5000);
    </script> -->

</html>
