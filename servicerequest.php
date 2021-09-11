<?php
            include('header.php');
        ?>
<!DOCTYPE html>
<html lang="en">
  
<!--  13:28  -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="js/bootstrap.min.js" rel="stylesheet" />
	<link href="css/flaticon.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />

    <title>SirFix</title>
  </head>
  <body>
    
  

  
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form"style="margin-top:5%;margin-bottom:5%;">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">تقديم خدمة</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">الاسم</label>
                                            <input type="text" id="first-name-column" class="form-control" placeholder="الاسم"
                                                name="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">العنوان</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="العنوان"
                                                name="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">الايميل</label>
                                            <input type="email" id="city-column" class="form-control" placeholder="الايميل" name="city-column">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">رقم الهاتف</label>
                                            <input type="text" id="country-floating" class="form-control" name="country-floating"
                                                placeholder="رقم الهاتف">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">الجهة</label>
                                            <input type="text" id="company-column" class="form-control" name="company-column"
                                                placeholder="اسم الجهة">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">الخدمة</label>
                                            <select class="form-control" name="email-id-column">
                                                <option>خدمة شاملة</option>
                                                <option>برمجة وصيانة</option>
                                                <option>شبكات وعقود</option>
                                                <option>تصاميم جرافيك</option>
                                        </select>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end"style="margin-top:1%;">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">ارسال</button>
                                        <button type="reset" class="btn btn-light-secondary mr-1 mb-1">الغاء</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
        
    <script src="js/feather-icons/feather.min.js"></script>
    <script src="js/main.js"></script>

  </body>

</html>

<?php
            include('footer.php');
        ?>
