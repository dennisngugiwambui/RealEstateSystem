<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<form>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>



    <button type="submit">Submit</button>
</form>


<script>

    const myObject = document.getElementById('name');
    myObject.addEventListener('keydown', function (evt) {
        const apiUrl = `http://localhost:8000/user/${myObject.value}`;


        fetch(apiUrl)
            .then(response => {

                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                // Parse the response as JSON
                return response.json();
            })
            .then(data => {
                // Handle the data
                console.log('Data received:', data);
            })
            .catch(error => {
                // Handle errors
                console.error('Fetch error:', error);
            });
        console.log(myObject.value);
    });
</script>
</body>
</html>
+
