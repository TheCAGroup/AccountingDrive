<?php
function makemodal_btnclose($modalid,$modaltitle,$modalbody)
{
echo '<div class="modal" id="'.$modalid.'" data-keyboard="false" data-backdrop="static" tabindex="-1">';
	echo '<div class="modal-dialog">';
	  echo '<div class="modal-content">';
	    echo '<div class="modal-header">';
	      echo '<h4 class="modal-title" id="mtitle">'.$modaltitle.'</h4>';
	    echo '</div>';
	    echo '<div class="modal-body" id="mbody">'.$modalbody;
	    echo '</div>';
	    echo '<div class="modal-footer" id="mfooter">';
	    	echo '<button type="button" class="btn btn-default" id="btn'.$modalid.'">Close</button>';
	    echo '</div>';
	  echo '</div>';
	echo '</div>';
echo '</div>';
echo '<script>';
echo '$("#btn'.$modalid.'").click(function(){';
		echo '$("#'.$modalid.'").modal("hide");';
	echo '});';
echo '</script>';
}

function makemodal_progress($modalid,$modaltitle)
{
	echo '<div class="modal" id="'.$modalid.'" data-keyboard="false" data-backdrop="static" tabindex="-1">';
	echo '<div class="modal-dialog">';
	  echo '<div class="modal-content">';
	    echo '<div class="modal-header">';
	      echo '<h4 class="modal-title" id="mtitle">'.$modaltitle.'</h4>';
	    echo '</div>';
	    echo '<div class="modal-body" id="mbody">';
		echo '<div class="progress progress-striped active"><div class="progress-bar" style="width: 100%;"> </div></div>';
	    echo '</div>';
	    echo '<div class="modal-footer" id="mfooter">';
	    echo '</div>';
	  echo '</div>';
	echo '</div>';
echo '</div>';
}
?>
