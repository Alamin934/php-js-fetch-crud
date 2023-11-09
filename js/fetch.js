// function for load student record in table on page load
function loadTable() {
	fetch("php/load-table.php")	
	.then((response)=>response.json())
	.then((data)=>{
		var tbody = document.getElementById("tbody");
		if(data['empty']){
			tbody.innerHTML = `<tr><td colspan='6' align='center'><h3>Record Not Found</h3></td></tr>`;
		}else{
			var tr = '';
			for(var i in data){
				var stdInfo = data[i];
				tr += `<tr>
					<td align='center'>${stdInfo.sid}</td>
					<td>${stdInfo.sname}</td>
					<td>${stdInfo.cname}</td>
					<td>${stdInfo.saddress}</td>
					<td>${stdInfo.sphone}</td>
					<td align='center'>
						<button class="edit-btn" onclick="editRecord(${stdInfo.sid})">Edit</button>
					</td>
					<td align='center'>
						<button class="delete-btn" onclick="deleteRecord(${stdInfo.sid})">Delete</button>
					</td>
				</tr>`;
			}
			tbody.innerHTML = tr;
		}
	})
	.catch((error)=>{
		if(error){
			showMessage('error', "Can't fetch data.");
		}else{
			showMessage('success', "fetch data successfully.");
		}
	})
}
loadTable();

// Open Add new student Modal Box 
function addNewModal(){
	var addModal = document.getElementById("addModal");
	addModal.style.display = "block";

	fetch("php/fetch-class-field.php")	
	.then((response)=>response.json())
	.then((data)=>{
		var select = document.getElementById("classlist");
		if(data['empty']){
			select.innerHTML = '<option>No Class Found</option>';
		}else{
			var option = '<option value="0" disabled selected>Select Class</option>';
			for(var c in data){
				var classes = data[c];
				option += `<option value="${classes.cid}">${classes.cname}</option>`;
			}
			select.innerHTML = option;
		}
	})
	.catch((error)=>{
		showMessage('error', "Can't fetch Class List.");
	})
}

// Hide Modal Box / Popup Box
function hideModal(){
	var addModal = document.getElementById("addModal");
	addModal.style.display = "none";

	var editModal = document.getElementById("modal");
	editModal.style.display = "none";
}
// Add Student Record
function submitData() {
	var name = document.getElementById('name').value;
	var address = document.getElementById('address').value;
	var sclass = document.getElementById('classlist').value;
	var phone = document.getElementById('phone').value;

	if(name === '' || address === '' || sclass === '' || phone === ''){
		alert("All fields must be filled");
		return false;
	}else{
		var formData = {
			name:name,
			address:address,
			class:sclass,
			phone:phone
		};
		var jsonData = JSON.stringify(formData);

		fetch("php/fetch-insert.php",{
			method: "POST",
			body: jsonData,
			headers:{
				'Content-type':'application/json',
			},
		})
		.then((response) => response.json())
		.then((result)=>{
			if(result.insert == 'success'){
				loadTable();
				hideModal();
				document.getElementById("addModal-form").reset();
				showMessage("success", "Data Inserted Successfully");
			}else{
				hideModal();
				showMessage("error", "Data Can't inserted");
			}
		})
		.catch((error)=>{
			hideModal();
			showMessage("error", "Data insert failed");
		})
	}
}


// Open Update Modal Box and show Student record in it.
function editRecord(id){
	var editModal = document.getElementById("modal");
	editModal.style.display = "block";
	
	fetch(`php/fetch-edit.php?editId=${id}`)
	.then((response)=>response.json())
	.then((data)=>{
		var cOption = '';
		for(var e in data.response){
			var editInfo = data.response[e];
			document.getElementById('edit-id').value=editInfo['sid'];
			document.getElementById('edit-name').value=editInfo['sname'];
			document.getElementById('edit-address').value=editInfo['saddress'];
			document.getElementById('edit-Phone').value=editInfo['sphone'];
			
			for(var editC in data.class){
				var editClass = data.class[editC];
				if(editClass['cid'] == editInfo['sclass']){
					var selected = 'selected';
				}else{
					var selected = '';
				}
				cOption +=`<option ${selected} value='${editClass['cid']}'>${editClass['cname']}</option>`;
			}
			document.getElementById('edit-class').innerHTML=cOption;
		}
	})
	.catch((error)=>{
		showMessage("error", "Data update failed");
	})
}

// Update student record
function updateData(){
	var uId = document.getElementById('edit-id').value;
	var uName = document.getElementById('edit-name').value;
	var uClass = document.getElementById('edit-class').value;
	var uAddress = document.getElementById('edit-address').value;
	var uPhone = document.getElementById('edit-Phone').value;
	
	if(uId === '' || uName === '' || uClass === '' || uAddress === '' || uPhone === ''){
		alert("All fields must be filled");
		return false;
	}else{
		var updateFormData = {
			id:uId,
			name:uName,
			class:uClass,
			address:uAddress,
			phone:uPhone
		};
		var updateJsonData = JSON.stringify(updateFormData);

		fetch("php/fetch-update.php",{
			method: "PUT",
			body: updateJsonData,
			headers:{
				'Content-type':'application/json',
			},
		})
		.then((response) => response.json())
		.then((result)=>{
			if(result.insert == 'success'){
				loadTable();
				hideModal();
				document.getElementById("updateModal").reset();
				showMessage("success", "Data Updated Successfully");
			}else{
				hideModal();
				showMessage("error", "Data Can't Update");
			}
		})
		.catch((error)=>{
			hideModal();
			showMessage("error", "Data Update failed");
		})
	}
}

// Delete student record


// Search student record


//show error / success message
function showMessage(type, message) {
	if(type == 'error'){
		var messageBox = document.getElementById("error-message");
	}else if(type == 'success'){
		var messageBox = document.getElementById("success-message");
	}
	messageBox.innerHTML=message;
	messageBox.style.display = "block";
	setTimeout(() => {
		messageBox.style.display = "none";
	}, 3000);
}