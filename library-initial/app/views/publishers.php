<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ناشران - {{ @TITLE }}</title>
  <link rel="stylesheet" href="{{ @BASE }}/assets/css/style.min.css">
  <link rel="stylesheet" href="{{ @BASE }}/assets/css/vazir-font.css">
  <link rel="stylesheet" href="{{ @BASE }}/assets/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ @BASE }}/assets/css/fontello.css">
</head>
<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ @BASE }}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="icon-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ @TITLE }}</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="{{ @BASE }}">
          <i class="icon-fw icon-gauge"></i>
          <span>پیشخوان</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ @BASE }}/books">
          <i class="icon-fw icon-book"></i>
          <span>کتاب‌ها</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ @BASE }}/authors">
          <i class="icon-fw icon-users"></i>
          <span>نویسندگان</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ @BASE }}/publishers">
          <i class="icon-fw icon-building-filled"></i>
          <span>ناشران</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="icon-menu"></i>
          </button>
        </nav>
        <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800"><i class="icon-building-filled"></i> ناشران</h1>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>نام</th>
                      <th>تعداد کتاب‌ها</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($publishers as $publisher) {
                        echo '<tr>';
                        echo '<td>' . $publisher->name . '</td>';
                        echo '<td>' . $publisher->books_count . '</td>';
                        echo '</tr>';
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>نام</th>
                      <th>تعداد کتاب‌ها</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>By <a target="_blank" href="https://quera.ir">Quera</a></span>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="icon-angle-up"></i>
  </a>
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalTitle">حذف کتاب</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">آیا مطمئن هستید که می‌خواهید این کتاب را حذف کنید؟</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">لغو</button>
          <a href="#" id="deleteConfirm" class="btn btn-danger">حذف</a>
        </div>
      </div>
    </div>
  </div>
  <script>var base_url = '{{ @BASE }}';</script>
  <script src="{{ @BASE }}/assets/js/jquery.min.js"></script>
  <script src="{{ @BASE }}/assets/js/bootstrap.bundle.min.js"></script>
  <script src="{{ @BASE }}/assets/js/jquery.easing.min.js"></script>
  <script src="{{ @BASE }}/assets/js/sb-admin-2.min.js"></script>
  <script src="{{ @BASE }}/assets/js/jquery.dataTables.min.js"></script>
  <script src="{{ @BASE }}/assets/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ @BASE }}/assets/js/app.js"></script>
</body>
</html>
