<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP & JavaScript Fetch CRUD</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="main">
    <div id="header">
      <h2>PHP & JavaScript Fetch CRUD</h2>
      <div id="search-bar">
        <label>Search :</label>
        <input type="text" id="search" autocomplete="off">
      </div>
    </div>
    
    <div id="table-data">
      <h3>All Records</h3>
      <button class="add_new" onclick="addNewModal();">Add New</button>
      <table border="1" width="100%" cellspacing="0" cellpadding="10px">
        <thead>
          <tr>
            <th width="60px">Sl.No</th>
            <th>Name</th>
            <th>Class</th>
            <th>Address</th>
            <th>Phone</th>
            <th width="90px">Edit</th>
            <th width="90px">Delete</th>
          </tr>
        </thead>
        <tbody id="tbody"></tbody>
      </table>
    </div>

    <div id="error-message"></div>
    <div id="success-message"></div>
  </div>


  <!-- modal for show add new -->
  <div id="addModal">
    <div id="modal-form" >
      <h2>Add New Form</h2>
      <form method="POST" id="addModal-form">
        <table cellpadding="10px" width="100%" id="add-form">
          <tr>
            <td width='90px'>Name</td>
            <td><input type='text' id='name'></td>
          </tr>
          <tr>
            <td width='90px'>Address</td>
            <td><input type='text' id='address' ></td>
          </tr>
          <tr>
            <td width='90px'>Class</td>
            <td>
              <select id="classlist"></select>
            </td>
          </tr>
          <tr>
            <td width='90px'>Phone</td>
            <td><input type='text' id='phone' ></td>
          </tr>
          <tr>
            <td></td>
            <td><button type="button" onclick="submitData()" id='new-submit'>Save</button></td>
          </tr>
        </table>
      </form>
      <div id="close-btn" onclick="hideModal()">X</div>
    </div>
  </div>

  <!-- modal for show edit -->
  <div id="modal">
    <div id="modal-form">
      <h2>Edit Form</h2>
      <form method="POST" id="updateModal">
        <table cellpadding="10px" width="100%" id="edit-form">
          <tr>
            <td width='90px'>Name</td>
            <td><input type='text' id='edit-name' autocomplete="off">
                <input type='text' id='edit-id' hidden>
            </td>
          </tr>
          <tr>
            <td width='90px'>Address</td>
            <td><input type='text' id='edit-address' autocomplete="off"></td>
          </tr>
          <tr>
            <td width='90px'>Class</td>
            <td>
              <select id='edit-class'></select>
            </td>
          </tr>
          <tr>
            <td width='90px'>Phone</td>
            <td><input type='text' id='edit-Phone' autocomplete="off"></td>
          </tr>
          <tr>
            <td></td>
            <td><button type="button" id='edit-submit' onclick="updateData()">Save</button></td>
          </tr>
        </table>
      </form>
      <div id="close-btn" onclick="hideModal()">X</div>
    </div>
  </div>
  
<script type="text/javascript" src="js/fetch.js"></script>
</body>
</html>
