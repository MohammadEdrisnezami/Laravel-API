<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حذف پس زمینه تصاویر</title>
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
</head>

<body>
    <nav class="navbar">
        <div class="nav-brand">
            <img src="{{ asset('/img/large.png') }}" id="logo" alt="">
        </div>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
        <div class="nav-links">
            <a href="#" class="nav-link">حذف پس زمینه</a>
            <a href="#" class="nav-link">ویژگی‌ها</a>
            <a href="#" class="nav-link">برای کسب و کار</a>
            <a href="#" class="nav-link">قیمت‌گذاری</a>
        </div>
        <div class="nav-auth">
            <button class="btn btn-login">ورود</button>
            <button class="btn btn-signup">ثبت نام</button>
        </div>
    </nav>

    <main class="hero">
          <!-- Modal -->
    <div class="modal fade" id="exampleModal" style="background-color: red;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 600px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ثبت نام کارمندان</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <form class="row g-3 needs-validation" novalidate action="/empolyer" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">نام</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">تخلص</label>
                            <input type="text" class="form-control" name="lastname" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">نام پدر</label>
                            <input type="text" class="form-control" name="father" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">تاریخ</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">آدرس</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">موبایل</label>
                            <input type="text" class="form-control" name="mobile" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ایمیل</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">تصویر</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success">ثبت</button>
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">بستن</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="hero-content">
            <h1>حذف پس زمینه تصاویر</h1>
            <p class="subtitle">۱۰۰٪ خودکار و رایگان</p>
            <div class="upload-section">
                <div class="upload-box">
                    <div class="upload-box-content">
                        <h3>تصویر خود را اینجا رها کنید</h3>
                        <p class="upload-hint">یا <span class="browse-text">فایل را انتخاب کنید</span></p>
                        <p class="file-info">فرمت‌های قابل قبول: JPG, PNG, JPEG</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-image">
            <img src="{{ asset('/img/girl.gif') }}" alt="">
        </div>
    </main>

    <input type="file" id="file-input" hidden accept="image/*">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>

  
</body>

</html>
