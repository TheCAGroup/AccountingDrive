/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function makeModalAlert(modalID, modalTitle, modalContent)
{
    var newdiv = document.createElement("div");
    newdiv.id = modalID;
    newdiv.className = 'modal';
    newdiv.setAttribute('data-keyboard','false');
    newdiv.setAttribute('data-backdrop','static');
    newdiv.setAttribute('tabindex','-1');
    newdiv.innerHTML = '<div class="modal-dialog"> \
                            <div class="modal-content"> \
                               <div class="modal-header"> \
                                  <button type="button" class="close" data-dismiss="modal" style="font-size: 2.5rem">×</button>\
                                  <h4 class="modal-title" id="mtitle">'+modalTitle+'</h4> \
                               </div> \
                               <div class="modal-body" id="mbody">'+modalContent + ' \
                               </div> \
                               <div class="modal-footer" id="mfooter"> \
                                    <button type="button" class="info" data-dismiss="modal" id="btn'+modalID+'">Close</button> \
                               </div> \
                           </div> \
                       </div>';
    document.getElementsByTagName('body')[0].appendChild(newdiv);
}

function makeModalProgress(modalID, modalTitle)
{
    var newdiv = document.createElement("div");
    newdiv.id = modalID;
    newdiv.className = 'modal';
    newdiv.setAttribute('data-keyboard','false');
    newdiv.setAttribute('data-backdrop','static');
    newdiv.setAttribute('tabindex','-1');
    newdiv.innerHTML = '<div class="modal-dialog"> \
                            <div class="modal-content"> \
                               <div class="modal-header"> \
                                   <h4 class="modal-title" id="mtitle">'+modalTitle+'</h4> \
                               </div> \
                               <div class="modal-body" id="mbody"> \
                               <div class="progress progress-striped active"><div class="progress-bar" style="width: 100%;"> </div></div> \
                               </div> \
                               <div class="modal-footer" id="mfooter"> \
                               </div> \
                           </div> \
                       </div>';
    document.getElementsByTagName('body')[0].appendChild(newdiv);
}

function makeModalConfirm(modalID, modalTitle, modalContent, action)
{
    var newdiv = document.createElement("div");
    newdiv.id = modalID;
    newdiv.className = 'modal';
    newdiv.setAttribute('data-keyboard','false');
    newdiv.setAttribute('data-backdrop','static');
    newdiv.setAttribute('tabindex','-1');
    newdiv.innerHTML = '<div class="modal-dialog"> \
                            <div class="modal-content"> \
                               <div class="modal-header"> \
                                   <button type="button" class="close" data-dismiss="modal" style="font-size: 2.5rem">×</button>\
                                   <h4 class="modal-title" id="mtitle">'+modalTitle+'</h4> \
                               </div> \
                               <div class="modal-body" id="mbody">'+modalContent + ' \
                               </div> \
                               <div class="modal-footer" id="mfooter"> \
                                    <button type="button" class="primary" id="btn_yes' + modalID +'" onclick="'+action+'">Yes</button> \
                                    <button type="button" class="info" data-dismiss="modal" id="btn_no'+ modalID +'">No</button> \
                               </div> \
                           </div> \
                       </div>';
    document.getElementsByTagName('body')[0].appendChild(newdiv);
    

}

