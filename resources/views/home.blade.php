<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>
        <div>
            <form action="/upload" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" />
                <input type="submit" value="Uploadto local" />
            </form>
            <form action="/s3upload" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" />
                <input type="submit" value="Upload to s3" />
            </form>
        </div>
    </body>
</html>