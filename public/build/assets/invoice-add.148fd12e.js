var i=new Date;FilePond.registerPlugin(FilePondPluginFileValidateType,FilePondPluginImageExifOrientation,FilePondPluginImagePreview,FilePondPluginImageCrop,FilePondPluginImageResize,FilePondPluginImageTransform);FilePond.create(document.querySelector(".filepond"),{imagePreviewHeight:80,imageCropAspectRatio:"1:1",imageResizeTargetWidth:80,imageResizeTargetHeight:80,stylePanelLayout:"compact circle",styleLoadIndicatorPosition:"center bottom",styleProgressIndicatorPosition:"right bottom",styleButtonRemoveItemPosition:"left bottom",styleButtonProcessItemPosition:"right bottom"});flatpickr(document.getElementById("date"),{defaultDate:i});flatpickr(document.getElementById("due"),{defaultDate:i.setDate(i.getDate()+5)});function c(){let e=document.querySelectorAll(".delete-item");for(var t=0;t<e.length;t++)e[t].addEventListener("click",function(){this.parentElement.parentNode.parentNode.parentNode.remove()})}function a(e,t){for(var r=e,n=0;n<r.length;n++)r[n].addEventListener("click",function(){var l=this.getAttribute("data-value"),o=this.getAttribute("data-img-value");l===null&&o===null&&console.warn("No attributes are defined. Kindly define one attribute atleast"),l!=""&&l!=null&&(this.parentElement.parentNode.querySelector(".dropdown-toggle > .selectable-text").innerText=l),o!=""&&o!=null&&this.parentElement.parentNode.querySelector(".dropdown-toggle > img").setAttribute("src",o)})}document.getElementsByClassName("additem")[0].addEventListener("click",function(){let e=document.querySelector(".item-table");currentIndex=e.rows.length,$html='<tr><td class="delete-item-row"><ul class="table-controls"><li><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li></ul></td><td class="description"><input type="text" class="form-control  form-control-sm" placeholder="Item Description"> <textarea class="form-control" placeholder="Additional Details"></textarea></td><td class="rate"><input type="text" class="form-control  form-control-sm" placeholder="Price"> </td><td class="text-right qty"><input type="text" class="form-control  form-control-sm" placeholder="Quantity"></td><td class="text-right amount"><span class="editable-amount"><span class="currency">$</span> <span class="amount">0.00</span></td><td class="text-center tax"><div class="n-chk"><div class="form-check form-check-primary form-check-inline me-0 mb-0"><input class="form-check-input inbox-chkbox contact-chkbox" type="checkbox"></div></div></td></tr>',$(".item-table tbody").append($html),c()});c();a(document.querySelectorAll(".invoice-select .dropdown-item"));a(document.querySelectorAll(".invoice-tax-select .dropdown-item"));a(document.querySelectorAll(".invoice-discount-select .dropdown-item"));
