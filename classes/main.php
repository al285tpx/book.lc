<?php
class main extends Core {

    public function get_content($link) {

        $query = "SELECT * FROM books.d_books ORDER BY id DESC";
        $result = mysqli_query($link, $query);
        if(!$result) {
            exit(mysqli_error($link));
        }

        echo '<div id="main">';

        $row = array();
        for($i = 0; mysqli_num_rows($result) < $i; $i++) {
            $row = mysqli_fetch_array($link, $result);
            printf("<div style='margin:10px;border-bottom:2px solid #c2c2c2'>
						<p style='font-size:18px'>%s</p>
						<p>%s</p>
						<p><img style='margin-right:5px' width='150px' align='left' src='%s'>%s</p>
						<p style='color:red'><a href='?option=view&id_text=%s'>Читать далее...</a></p>
					
					</div>
					",$row['title'],$row['year'],$row['author'],$row['col_str'],$row['id']);
        }
        echo '</div>
			</div>';
    }
}