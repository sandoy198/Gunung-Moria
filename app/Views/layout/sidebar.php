 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-success bg-success elevation-4">
      <!-- Brand Logo -->
      <a href="/" class="brand-link" style="height: 50px;">
           <img src="<?= base_url(); ?>/asset/img/logo.jpeg" alt="Gudung Moria Logo" class="brand-image-xs elevation-3"
                style="opacity: .8;">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
           <!-- Sidebar user panel (optional) -->
           <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                     <img src="<?= base_url(); ?>/asset/adminlte/dist/img/user2-160x160.jpg"
                          class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                     <a href="/Account/detail/<?= auth()->id(); ?>"
                          class="d-block"><?= auth()->getUser()->username; ?></a>
                </div>
           </div>
           <!-- Sidebar Menu -->
           <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                     data-accordion="false">
                     <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                     <li class="nav-item">
                          <a href="/item" class="nav-link">
                               <i class=" nav-icon fas fa-box-open"></i>
                               <p>
                                    Items
                               </p>
                          </a>
                     </li>
                     <li class="nav-item">
                          <a href="/SalesOrder" class="nav-link">
                               <i class=" nav-icon fas fa-copy"></i>
                               <p>
                                    Sales Order
                               </p>
                          </a>
                     </li>
                     <li class="nav-item">
                          <a href="/PurchasingOrder" class="nav-link">
                               <i class=" nav-icon fas fa-clipboard"></i>
                               <p>
                                    Purchasing Order
                               </p>
                          </a>
                     </li>
                     <li class="nav-item">
                          <a href="/PurchasingOrder/Approval" class="nav-link">
                               <i class=" nav-icon far fa-check-circle"></i>
                               <p>
                                    Approval Purchasing Order
                               </p>
                          </a>
                     </li>
                     <li class="nav-item" hidden>
                          <a href="/Order" class="nav-link">
                               <i class=" nav-icon  fas fa-boxes"></i>
                               <p>
                                    Order
                               </p>
                          </a>
                     </li>
                     <li class="nav-item">
                          <a href="/ReceivingProduct" class="nav-link">
                               <i class=" nav-icon fas fa-truck-loading"></i>
                               <p>
                                    Receiving Product
                               </p>
                          </a>
                     </li>
                     <li class="nav-item">
                          <a href="/SendingOrder" class="nav-link">
                               <i class=" nav-icon fas fa-truck"></i>
                               <p>
                                    Sending Order
                               </p>
                          </a>
                     </li>
                     <li class="nav-item">
                          <a href="#" class="nav-link">
                               <i class=" nav-icon far fa-file"></i>
                               <p>
                                    Report
                               </p>
                          </a>
                          <ul class="nav nav-treeview">
                               <li class="nav-item">
                                    <a href="/Report/SendingOrder" class="nav-link">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Report Sending Order</p>
                                    </a>
                               </li>
                               <li class="nav-item">
                                    <a href="/Report/PurchasingOrder" class="nav-link">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Report Purchasing Order</p>
                                    </a>
                               </li>
                          </ul>
                     </li>
                </ul>
           </nav>
           <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
 </aside>