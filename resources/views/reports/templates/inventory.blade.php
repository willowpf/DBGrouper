<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inventory Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #444; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Inventory Report</h1>
    <p>Category: {{ $params['category'] ?? 'All' }}</p>

    <table>
        <thead>
            <tr><th>Item</th><th>Stock</th><th>Reorder Level</th></tr>
        </thead>
        <tbody>
            <tr><td>Item A</td><td>34</td><td>10</td></tr>
            <tr><td>Item B</td><td>12</td><td>5</td></tr>
        </tbody>
    </table>
</body>
</html>
