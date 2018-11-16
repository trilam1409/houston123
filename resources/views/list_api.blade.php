<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Rambla" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>List API</title>
</head>
<body>
    <div class="block-main-content">
        <div class="container">
            <div class="field-header container p-0">
                <div class="row">
                    <div class="views-col views-col-1">Method</div>
                    <div class="views-col views-col-2">Url</div>
                    <div class="views-col views-col-3">Header</div>
                    <div class="views-col views-col-4">Params</div>
                    <div class="views-col views-col-5">Json resutl</div>
                    <div class="views-col views-col-6">Describe</div>
                </div>
            </div>
            <div class="field-group field-group-first">
                <div class="field-title"><p>Marketing</p></div>
                <div id="marketing" class="field-body">
                </div>  
            </div>

            <div class="field-group">
                <div class="field-title"><p>Account</p></div>
                <div id="account" class="field-body"></div>
            </div>
            <div class="field-group">
                <div class="field-title"><p>Giáo viên</p></div>
                <div id="gv" class="field-body"></div>
            </div>
            <div class="field-group">
                <div class="field-title"><p>Quản lý</p></div>
                <div id="ql" class="field-body"></div>
            </div>
            <div class="field-group">
                <div class="field-title"><p>Học viên</p></div>
                <div id="hocvien" class="field-body"></div>
            </div>
            <div class="field-group">
                <div class="field-title"><p>Cơ sở</p></div>
                <div id="coso" class="field-body"></div>
            </div>
            <div class="field-group">
                <div class="field-title"><p>Loại quản lý</p></div>
                <div id="loaiql" class="field-body"></div>
            </div>
            <div class="field-group">
                <div class="field-title"><p>Môn học</p></div>
                <div id="monhoc" class="field-body"></div>
            </div>
            <div class="field-group">
                <div class="field-title"><p>Lớp học</p></div>
                <div id="lophoc" class="field-body"></div>
            </div>
            <div class="field-group">
                <div class="field-title"><p>Phòng học</p></div>
                <div id="phonghoc" class="field-body"></div>
            </div>
            <!-- <div class="field-group">
                <div class="field-title"><p>Đăng ký môn học</p></div>
                <div id="dkmonhoc" class="field-body"></div>
            </div> -->
            <div class="field-group">
                <div class="field-title"><p>Chi tiết lớp học</p></div>
                <div id="chitietlop" class="field-body"></div>
            </div>
            <!-- <div class="field-group">
                <div class="field-title"><p>Chương trình học bổ sung</p></div>
                <div id="ctrinh_bosung" class="field-body"></div>
            </div> -->
        
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</html>
