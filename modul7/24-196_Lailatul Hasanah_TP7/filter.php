<!doctype html>
<html>
<head>
    <title>Filter</title>
    <style>
        body { 
            font-family: Arial; 
            margin: 30px; 
        }

        .card { 
            border: 1px solid #ddd; 
            padding: 20px; 
            border-radius: 8px; 
            width: 420px; 
        }

        button {
            padding: 10px 18px; 
            background: #4CAF50;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>

    <div class="card">
        <form method="GET" action="no2.php">

            <input type="date" name="from" value="<?= $_GET['from'] ?? '' ?>" required>
            <input type="date" name="to" value="<?= $_GET['to'] ?? '' ?>" required>

            <button type="submit">Tampilkan</button>
        </form>
    </div>
    
    <script>
        function tampilkanData() {
            const from = document.getElementById('from').value;
            const to = document.getElementById('to').value;
        }
    </script>
</body>
</html>