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
                                if ($currentYear != null) {
                                    echo '</ul>';
                                }
                                echo "<h5>$year</h5>";
                                echo "<ul>";
                                $currentYear = $year;
                            }
                            echo "<li>";
                            echo "<strong> " . $row['author'] . ",</strong>";
                            echo "<i> " . $row['judul'] . ",</i>";
                            echo " " . $row['kegiatan'] . ",";
                            echo " " . $row['tambahan'] . ".";
                            echo "</li>";
                        }
                        echo '</ul>';
                    }
                    ?>
              </div>

              <div class="resume-item pb-0">
                  <h4>Conference</h4>
                  <?php
                    $query = "SELECT * FROM publikasi WHERE is_deleted=0 AND kategori='conference' ORDER BY tanggal_terbit DESC";
                    $result = mysqli_query($koneksi, $query);
                    if (mysqli_num_rows($result) > 0) {
                        $currentYear = null;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $year = date('Y', strtotime($row['tanggal_terbit']));

                            if ($year != $currentYear) {
                                if ($currentYear != null) {
                                    echo '</ul>';
                                }
                                echo "<h5>$year</h5>";
                                echo "<ul>";
                                $currentYear = $year;
                            }
                            echo "<li>";
                            echo "<strong> " . $row['author'] . ",</strong>";
                            echo "<i> " . $row['judul'] . ",</i>";
                            echo " " . $row['kegiatan'] . ",";
                            echo " " . $row['tambahan'] . ".";
                            echo "</li>";
                        }
                        echo '</ul>';
                    }
                    ?>                 
              </div>

          </div>

      </div>

  </div>