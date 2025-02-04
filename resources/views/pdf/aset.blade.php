<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    @page {
        header: page-header;
        footer: page-footer;
    }
    </style>
</head>

<body class="{{ $class ?? '' }}">
<htmlpageheader name="page-header">
    Your Header Content
</htmlpageheader>
abc
<htmlpagefooter name="page-footer">
    {PAGENO}
</htmlpagefooter>
</body>
</html>
