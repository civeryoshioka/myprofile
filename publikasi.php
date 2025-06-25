  <?php include 'koneksi.php'; ?>
  <div class="container">

      <div class="section-title">
          <h2>Publikasi</h2>
      </div>

      <div class="row">
          <div class="col-lg-12" data-aos="fade-up">
              <h3 class="resume-title"></h3>
              <div class="resume-item pb-0">
                  <h4>Jurnal</h4>
                  <?php
                    $query = "SELECT * FROM publikasi WHERE is_deleted=0 AND kategori='jurnal' ORDER BY tanggal_terbit DESC";
                    $result = mysqli_query($koneksi, $query);
                    if (mysqli_num_rows($result) > 0) {
                        $currentYear = null;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $year = date('Y', strtotime($row['tanggal_terbit']));
                           
                            if ($year != $currentYear) {
                                if($currentYear != null){
                                    echo '</ul>'; 
                                }
                                echo "<h5>$year</h5>";
                                echo "<ul>";
                                $currentYear=$year;
                            }
                            echo "<li>";
                            echo "<strong> " . $row['author'] . ",</strong>";
                            echo "<i> " . $row['judul'] . ",</i>";
                            echo " ". $row['kegiatan'] . ",";
                            echo " ". $row['tambahan'] . ".";
                            echo "</li>";
                        }                       
                        echo '</ul>';
                    } 
                    ?>
              </div>


              <div class="resume-item pb-0">
                  <h4>Conference</h4>
                  <h5>2020</h5>
                  <ul>
                      <li><strong>Miftahun Najat, Ali Ridho Barakbah, Mu'arifin,</strong> <i>Implementation Of Automatic Clustering In Parallel Computation With Multi-Threading And Socket Programming,</i> International Electronics Symposium (IES) 2020-IEEE co-sponsored conference, September 29-30, 2020, Surabaya, Indonesia</li>
                      <li><strong>Nana Ramadijanti, Mu’arifin, Achmad Basuki,</strong> <i>Comparison of Covid-19 Cases in Indonesia and Other Countries for Prediction Models in Indonesia Using Optimization in SEIR Epidemic Models,</i> 2020 International Conference on ICT for Smart Society (ICISS), Nov 19-20, 2020, Bandung, Indonesia</li>
                      <li><strong>Arna Fariza, Mu'arifin, Amailina Puspitasari,</strong> <i>Spatial Fuzzy Risk Mapping for Tuberculosis in Surabaya, Indonesia,</i> International Electronics Symposium (IES) 2020-IEEE co-sponsored conference, September 29-30, 2020, Surabaya, Indonesia<< /li>
                  </ul>
                  <h5>2019</h5>
                  <ul>
                      <li><strong>Arna Fariza, Mu’arifin, Agus Zainal Arifin,</strong> <i>Age Estimation System Using Deep Residual Network Classification Method,</i> 2019 International Electronics Symposium (IES), September 27-28, 2019, Surabaya, Indonesia</li>
                  </ul>
                  <h5>2018</h5>
                  <ul>
                      <li><strong>Mohammad Robihul Mufid, Nilla Rachmi Kusuma Saginta Putri, Arna Fariza, Mu'arifin,</strong> <i>Fuzzy Logic and Exponential Smoothing for Mapping Implementation of Dengue Haemorrhagic Fever in Surabaya,</i> 2018 International Electronics Symposium on Knowledge Creation and Intelligent Computing (IES-KCIC), 29-30 Oct 2018, Bali, Indonesia</li>
                  </ul>
                  <h5>2015</h5>
                  <ul>
                      <li><strong>Tri Harsono, Ali Ridho Barakbah, Kohei ARAI, Mu'arifin,</strong> <i> Human Behavior Based Evacuation in A Large Room Using Cellular Automata Model For Pedestrian Dynamics,</i> The Third Indonesian-Japanese Conference on Knowledge Creation and Intelligent Computing (KCIC) 2014, March 25-26, 2014, Malang, Indonesia</li>
                  </ul>
              </div>

          </div>

      </div>

  </div>