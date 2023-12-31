<?php
session_start();
include_once "Header_Links.php";
?>
<div class="container-scroller">
  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
      <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
        <a class="navbar-brand brand-logo" href="index.html"></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <ul class="navbar-nav mr-lg-2">
        <li class="nav-item nav-profile dropdown">
          <div class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="Admin_Images/<?php echo $_SESSION['AdminImage'] ?>" alt="logo" />
            <span class="nav-profile-name"><?php echo $_SESSION['AdminName'] ?></span>
          </div>
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-date dropdown">
          <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
            <h6 class="date mb-0">Today : Mar 23</h6>
            <i class="typcn typcn-calendar"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
            <i class="typcn typcn-cog-outline mx-0"></i>
            <span class="count"></span>
          </a>
          <a href="SignOut.php" class="badge badge-primary ml-3 py-3 px-3">Sign Out</a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
            <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <!-- <img src="images/faces/face4.jpg" alt="image" class="profile-pic"> -->
                <img src="Admin_Images/<?php echo $_SESSION['AdminImage'] ?>" alt="logo" />
              </div>
              <div class="preview-item-content flex-grow">
                <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                </h6>
                <p class="font-weight-light small-text text-muted mb-0">
                  The meeting is cancelled
                </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content flex-grow">
                <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                </h6>
                <p class="font-weight-light small-text text-muted mb-0">
                  New product launch
                </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
              </div>
              <div class="preview-item-content flex-grow">
                <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                </h6>
                <p class="font-weight-light small-text text-muted mb-0">
                  Upcoming board meeting
                </p>
              </div>
            </a>
          </div>
        </li>
        <li class="nav-item dropdown mr-0">
          <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="typcn typcn-bell mx-0"></i>
            <span class="count"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-success">
                  <i class="typcn typcn-info mx-0"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">Application Error</h6>
                <p class="font-weight-light small-text mb-0 text-muted">
                  Just now
                </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-warning">
                  <i class="typcn typcn-cog-outline mx-0"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">Settings</h6>
                <p class="font-weight-light small-text mb-0 text-muted">
                  Private message
                </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-info">
                  <i class="typcn typcn-user mx-0"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">New user registration</h6>
                <p class="font-weight-light small-text mb-0 text-muted">
                  2 days ago
                </p>
              </div>
            </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="typcn typcn-th-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_settings-panel.html -->
    <div class="theme-setting-wrapper">
      <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
      <div id="theme-settings" class="settings-panel">
        <i class="settings-close typcn typcn-times"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-light-theme">
          <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
        </div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme">
          <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
        </div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
          <div class="tiles success"></div>
          <div class="tiles warning"></div>
          <div class="tiles danger"></div>
          <div class="tiles info"></div>
          <div class="tiles dark"></div>
          <div class="tiles default"></div>
        </div>
        <a href="Edit.php?id=<?php echo $_SESSION['AdminId'] ?>" class="btn text-white text-lg h6 ml-2" style="background-color: #844fc1;">Edit Profile</a>
      </div>
    </div>
    <div id="right-sidebar" class="settings-panel">
      <i class="settings-close typcn typcn-times"></i>
      <ul class="nav nav-tabs" id="setting-panel" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
        </li>
      </ul>
      <div class="tab-content" id="setting-content">
        <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
          <div class="add-items d-flex px-3 mb-0">
            <form class="form w-100">
              <div class="form-group d-flex">
                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
              </div>
            </form>
          </div>
          <div class="list-wrapper px-3">
            <ul class="d-flex flex-column-reverse todo-list">
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Team review meeting at 3.00 PM
                  </label>
                </div>
                <i class="remove typcn typcn-delete-outline"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Prepare for presentation
                  </label>
                </div>
                <i class="remove typcn typcn-delete-outline"></i>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Resolve all the low priority tickets due today
                  </label>
                </div>
                <i class="remove typcn typcn-delete-outline"></i>
              </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Schedule meeting for next week
                  </label>
                </div>
                <i class="remove typcn typcn-delete-outline"></i>
              </li>
              <li class="completed">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Project review
                  </label>
                </div>
                <i class="remove typcn typcn-delete-outline"></i>
              </li>
            </ul>
          </div>
          <div class="events py-4 border-bottom px-3">
            <div class="wrapper d-flex mb-2">
              <i class="typcn typcn-media-record-outline text-primary mr-2"></i>
              <span>Feb 11 2018</span>
            </div>
            <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
            <p class="text-gray mb-0">build a js based app</p>
          </div>
          <div class="events pt-4 px-3">
            <div class="wrapper d-flex mb-2">
              <i class="typcn typcn-media-record-outline text-primary mr-2"></i>
              <span>Feb 7 2018</span>
            </div>
            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
            <p class="text-gray mb-0 ">Call Sarah Graves</p>
          </div>
        </div>
        <!-- To do section tab ends -->
        <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
          <div class="d-flex align-items-center justify-content-between border-bottom">
            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
            <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
              All</small>
          </div>
          <ul class="chat-list">
            <li class="list active">
              <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Thomas Douglas</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">19 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
              <div class="info">
                <div class="wrapper d-flex">
                  <p>Catherine</p>
                </div>
                <p>Away</p>
              </div>
              <div class="badge badge-success badge-pill my-auto mx-2">4</div>
              <small class="text-muted my-auto">23 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Daniel Russell</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">14 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
              <div class="info">
                <p>James Richardson</p>
                <p>Away</p>
              </div>
              <small class="text-muted my-auto">2 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Madeline Kennedy</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">5 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Sarah Graves</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">47 min</small>
            </li>
          </ul>
        </div>
        <!-- chat tab ends -->
      </div>
    </div>
    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav" style="margin-top: 3rem;">
        <li class="nav-item">
          <a class="nav-link" href="Index.php">
            <i class="typcn typcn-device-desktop menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            <div class="badge badge-danger">new</div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Slider.php">
            <i class="fa-solid fa-sliders mr-3"></i>
            <span class="menu-title">Slider</span>
            <i class="menu-arrow"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Display_Slider_Products.php">
            <i class="fa-solid fa-sliders mr-3"></i>
            <span class="menu-title">Home Slider</span>
            <i class="menu-arrow"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="HomeBanner.php">
            <i class="typcn typcn-film menu-icon"></i>
            <span class="menu-title">Home Banner</span>
            <i class="menu-arrow"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Products.php">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
            <span class="menu-title">Insert Products</span>
            <i class="menu-arrow"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="DisplayProducts.php">
            <i class="typcn typcn-globe-outline menu-icon"></i>
            <span class="menu-title">Display Products</span>
            <i class="menu-arrow"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Orders.php">
            <i class="typcn typcn-compass menu-icon"></i>
            <span class="menu-title ">Orders</span>
            <span class='ml-2 badge badge-danger menu-item' id="notification-count">0</span>
            <i class="menu-arrow"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="DealSection.php">
            <i class="typcn typcn-user-add-outline menu-icon"></i>
            <span class="menu-title">Deal Section</span>
            <i class="menu-arrow"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Category.php">
            <i class="typcn typcn-user-add-outline menu-icon"></i>
            <span class="menu-title">Category</span>
            <i class="menu-arrow"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="DisplayCategory.php">
            <i class="typcn typcn-user-add-outline menu-icon"></i>
            <span class="menu-title">Display Category</span>
            <i class="menu-arrow"></i>
          </a>
        </li>
      </ul>
    </nav>


    <script>
      $(document).ready(function() {
        function updateNotificationCount() {
          $.ajax({
            url: 'get_notifications.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
              document.getElementById('notification-count').innerText = data.count;
            },
            error: function() {
              console.error('Error fetching notification count.');
            }
          });
        }
        updateNotificationCount();
        setInterval(updateNotificationCount, 5000); 



        function markNotificationsAsRead() {
          $.ajax({
            url: 'mark_notifications.php',
            type: 'POST',
            success: function() {
              updateNotificationCount();
            },
            error: function() {
              console.error('Error marking notifications as read.');
            }
          });
        }
        document.querySelector('.menu-item').addEventListener('click', function() {
          markNotificationsAsRead();
        });


      })
    </script>


    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">