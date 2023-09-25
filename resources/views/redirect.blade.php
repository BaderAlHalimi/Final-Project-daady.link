<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $card->title }}">
    <meta name="twitter:description" content="{{ $card->description }}">
    <meta name="twitter:image" content="{{ Storage::disk('public')->url($card->image_path) }}">

</head>

<body>
    <!--<img src="{{ Storage::disk('public')->url($card->image_path) }}">-->
    <input type="text" id="url" hidden value="{{ $card->redirect_url }}">

    <script>
        // استخراج قيمة الـ URL من الحقل المخفي
        var url = document.getElementById("url").value;

        // إذا لم يبدأ ال URL بـ "http://" أو "https://"
        if (!url.startsWith("http://") && !url.startsWith("https://")) {
            // قم بإضافة "http://" كافتراضي
            url = "http://" + url;
        }

        // قم بفتح الرابط
        window.location.href = url;
    </script>
</body>

</html>
