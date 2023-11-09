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


// Hide Modal Box / Popup Box

// Add Student Record


// Open Update Modal Box and show Student record in it.


// Update student record


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