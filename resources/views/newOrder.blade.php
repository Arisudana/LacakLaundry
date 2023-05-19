<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="/input" method="POST">
        <div class="mb-3">
            {{ csrf_field() }}
            <label for="customerName" class="form-label">Customer's Name</label>
            <input type="text" class="form-control" id="customerName" name="customerName">
        </div>
        <div class="mb-3">
            <label for="phoneNumber" class="form-label">Customer's Phone Number</label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
        </div>
        <div class="mb-3">
            <label for="orderWeight" class="form-label">Laundry's Weight</label>
            <input type="number" class="form-control" id="orderWeight" name="orderWeight">
        </div>
        <div class="mb-3">
            <label for="orderType" class="form-label">Laundry Type</label>
            <select class="form-select" label for="orderType" id="orderType" name="orderType">
                <option selected>Choose the option for the type of the laundry</option>
                <option value="Cuci Basah">Cuci Basah</option>
                <option value="Cuci Kering">Cuci Kering</option>
                <option value="Cuci Kering Setrika">Cuci Kering Setrika</option>
              </select>
        </div>
        <div class="mb-3">
            <label for="nominalOrder" class="form-label">Total Price </label>
            <input type="number" class="form-control" id="nominalOrder" name="nominalOrder">
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var orderType = document.getElementById('orderType');
                var orderWeight = document.getElementById('orderWeight');

                orderType.addEventListener('change', function () {
                    var selectedOption = orderType.value;
                    var totalPrice = orderWeight.value;

                    if (selectedOption === 'Cuci Basah') {
                        totalPrice *= 3000;
                    } else if (selectedOption === 'Cuci Kering') {
                        totalPrice *= 4000;
                    } else if (selectedOption === 'Cuci Kering Setrika') {
                        totalPrice *= 5000;
                    }

                    document.getElementById('nominalOrder').value = totalPrice;
                });
            });
        </script>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</body>
</html>
