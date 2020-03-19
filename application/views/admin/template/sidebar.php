  <!-- Sidebar navigation -->
  <div id="slide-out" class="side-nav fixed sn-bg-4">
      <ul class="custom-scrollbar">
          <!-- Logo -->
          <li class="logo-sn waves-effect">
              <div class=" text-center">
                  <a href="#" class="pl-0">
                      <img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="">
                  </a>
              </div>
          </li>
          <!--/. Logo -->
          <!-- Side navigation links -->
          <li>
              <!-- query menu -->
              <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT `user_menu`.`id`, `menu`,`icon`,`urut`,`url`
                            FROM `user_menu` JOIN `user_access_menu`
                            ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                        WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_menu`.`urut` ASC
                        -- ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
                $menu = $this->db->query($queryMenu)->result_array();


                ?>


              <!-- Loop Menu -->
              <?php foreach ($menu as $m) : ?>

                  <!-- SUB-MENU SESUAI MENU -->
                  <?php
                    $sub_role_id = $this->session->userdata('role_id');
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
                                FROM `user_sub_menu` 
                                JOIN `user_menu`ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                JOIN `user_access_sub_menu` ON `user_sub_menu`.`id_sub` = `user_access_sub_menu`.`sub_menu_id`
                            WHERE `user_sub_menu`.`menu_id` = $menuId
                                AND `user_access_sub_menu`.`sub_role_id` = $sub_role_id
                                AND `user_sub_menu`.`is_active` = 1 
                                ORDER BY `user_sub_menu`.`urut_sub` ASC
                            ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>

                  <?php if ($m['url'] == '') : ?>
                      <ul class="collapsible collapsible-accordion">
                          <li><a onclick="return false;" href="" id="tambah-kelas" class="collapsible-header waves-effect arrow-r 
                          
                          <?php foreach ($subMenu as $sm) : ?>
                            <?php if ($this->uri->segment('1') == $sm['sub_url']) {
                                    echo 'active';
                                }  ?> 

                              <?php endforeach; ?>

                              "><i class="<?= $m['icon'] ?>"></i> </i><?= $m['menu'] ?><i class="fa fa-angle-down rotate-icon"></i></a>

                              <!-- Loop sub Menu -->
                              <?php foreach ($subMenu as $sm) : ?>
                                  <div class="collapsible-body">
                                      <ul>
                                          <li><a href="<?= base_url($sm['sub_url']); ?>" class="waves-effect <?php if ($this->uri->segment('1') == $sm['sub_url']) {
                                                                                                                    echo 'active';
                                                                                                                }  ?> "><?= $sm['sub'] ?></a>
                                          </li>

                                      </ul>
                                  </div>

                              <?php endforeach; ?>
                          </li>
                      </ul>

                  <?php else : ?>
                      <!-- Menu -->
                      <ul class="collapsible collapsible-accordion ">
                          <li><a href="<?= base_url($m['url']); ?>" class="collapsible-header waves-effect arrow-r <?php if ($this->uri->segment('1') == $m['url']) {
                                                                                                                        echo 'active';
                                                                                                                    } ?> "><i class="<?= $m['icon'] ?>"></i><?= $m['menu'] ?></i></a>
                      </ul>

                  <?php endif; ?>


              <?php endforeach; ?>


          </li>
          <!--/. Side navigation links -->
      </ul>
      <div class="sidenav-bg rgba-blue-strong"></div>
  </div>
  <!--/. Sidebar navigation -->