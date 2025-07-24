@extends('layouts.master')

@section('title', 'Myraluxa Aesthetic Pvt Ltd')

@section('content')

<style>
    body {

        background: linear-gradient(90deg, rgb(0 0 0 / 43%) 0%, rgb(0 0 0 / 51%) 100%),
            url("assets/img/slider/face.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;

    }




    h1 {
        font-size: 32px;
        margin-bottom: 20px;
    }

    .balance-box {
        background-color: white;
        font-family: rubik, sans-serif;
        padding: 20px 30px;
        border-radius: 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 18px;
        font-weight: 500;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
    }



    .credit-box {
        background-color: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .credit-box h2 {
        font-size: 20px;
        margin-bottom: 20px;
    }

    .amount-input {
        width: 100%;
        padding: 14px 16px;
        font-size: 18px;
        border: 1px solid #ccc;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .amount-input:focus {
        border-color: #aaa;
        outline: none;
    }

    .quick-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 30px;

    }

    .quick-buttons button {

        padding: 12px;
        font-size: 16px;
        background: #fff;
        border: 1px solid #999;
        border-radius: 10px;
        /* font-weight: bold; */
        cursor: pointer;
        text-align: center;
        transition: background 0.3s;
    }

    .quick-buttons button:hover {
        background-color: #f5f5f5;
    }


    .wallet-btn1 {
        /* width: 100%; */
        padding: 14px;
        background-color: black;
        color: white;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 12px;
        cursor: pointer;
    }

    @media (max-width: 600px) {
        .quick-buttons button {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
           width: 110px;
            justify-content: space-between;
        }

        .main {
            margin-top: 20%;
        }
    }
</style>
<main class="main">
    <section>
        <div class="container py-5">
            <!-- <div class="row d-flex justify-content-center">
            <img class="logo mb-3" src="./assets/img/logo/logo.png" alt="">
        </div> -->
            <div class="balance-box">
                <span>Balance Available</span>
                <span>Rs. 0</span>
            </div>

            <div class="credit-box">
                <h2>Add Credits</h2>

                <input type="number" class="amount-input" placeholder="Amount" id="amountInput" />

                <div class="quick-buttons">
                    <button data-amount="5000">Rs. 5,000</button>
                    <button data-amount="10000">Rs. 10,000</button>
                    <button data-amount="15000">Rs. 15,000</button>
                    <button data-amount="20000">Rs. 20,000</button>
                </div>


                <button type="submit" class="wallet-btn1" disabled>ADD TO WALLET</button>
            </div>
        </div>
    </section>
</main>

<!-- amount fill -->
 <script>
  const amountInput = document.getElementById('amountInput');
  const buttons = document.querySelectorAll('.quick-buttons button');

  buttons.forEach(button => {
    button.addEventListener('click', function () {
      const value = this.getAttribute('data-amount');
      amountInput.value = value;
    });
  });
</script>

 <!-- end amount fill -->
  

@endsection