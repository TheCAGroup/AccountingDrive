<?php
function makemodal_alert($modalid,$modaltitle,$modalbody)
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

function makemodal_confirm($modalid,$modaltitle,$modalbody)
{
echo '<div class="modal" id="'.$modalid.'" data-keyboard="true" data-backdrop="static" tabindex="-1">';
	echo '<div class="modal-dialog">';
	  echo '<div class="modal-content">';
	    echo '<div class="modal-header">';
	      echo '<h4 class="modal-title" id="mtitle">'.$modaltitle.'</h4>';
	    echo '</div>';
	    echo '<div class="modal-body" id="mbody">'.$modalbody;
	    echo '</div>';
	    echo '<div class="modal-footer" id="mfooter">';
	    	echo '<button type="button" class="btn btn-primary" id="btn_yes'.$modalid.'">Yes</button>';
			echo '<button type="button" class="btn btn-default" id="btn_no'.$modalid.'">No</button>';
	    echo '</div>';
	  echo '</div>';
	echo '</div>';
echo '</div>';
echo '<script>';
echo '$("#btn_no'.$modalid.'").click(function(){';
	echo 'event.preventDefault();';
	echo '$("#'.$modalid.'").modal("hide");';
	echo 'return false;';
echo '});';
echo '$("#btn_yes'.$modalid.'").click(function(){';
	echo 'event.preventDefault();';
	echo 'console.log("Yes clicked")';
	echo 'return true;';
	//echo $callbackfn.'();';
echo '});';
echo '</script>';
}

?>
