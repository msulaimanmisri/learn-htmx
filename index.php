<?php
require 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>HTMX with PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container my-5">
        <h1 hx-trigger="click"
            hx-get="/get-data.php?id=1"
            hx-target="#print-here"
            hx-vals=".card-body">
            Click to Fetch the Data
        </h1>

        <div id="print-here"
            class="card card-body border-0 rounded-3 shadow-sm my-4 text-muted">
            <h3>
                <?php echo $title ?? "..."; ?>
            </h3>

            <p class="mb-0">
                <?php echo $content ?? ""; ?>
            </p>

        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://unpkg.com/htmx.org@1.9.10"
        integrity="sha384-D1Kt99CQMDuVetoL1lrYwg5t+9QdHe7NLX/SoJYkXDFfX37iInKRy5xLSi8nO7UC"
        crossorigin="anonymous"></script>

    <script>
    document.addEventListener('htmx:afterSwap', function(event) {
        const responseData = event.detail.elt.innerHTML;
        const jsonData = JSON.parse(responseData);

        const printHere = document.getElementById('print-here');
        const title = `<h3>${jsonData.title}</h3>`;
        const content = `<p class="mb-0">${jsonData.content}</p>`;

        printHere.innerHTML = `${title} ${content}`;
    });
    </script>



</body>

</html>