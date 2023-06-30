<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print Content</title>
    <style>
        #content {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div id="content">
        <h1>Header</h1>
        <p>Paragraph 1</p>
        <p>Paragraph 2</p>
        <p>Paragraph 3</p>
        <p>Paragraph 4</p>
    </div>
    <button onclick="printContent()">Print</button>
    <script>
        function printContent() {
            let content = document.getElementById('content');
            let printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>Print Content</title>');
            printWindow.document.write('</head><body>' + content.innerHTML + '</body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }
    </script>
</body>
</html>