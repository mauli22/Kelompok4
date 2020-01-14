<h2>Tambah Admin User</h2>
<form name="edit" method="post" action="?tampil=user_addproses">
<table>
    <tr>
        <td>Username</td>
        <td><input type="text" name="username"></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><input type="text" name="nama"></td>
    </tr>
	<tr>
    	<td>Level User</td>
        <td><select name="level" placeholder="Level User" value="">
            <option value="admin">Administrator</option>
            <option value="member">Member</option>
        </select></td>
    </tr>
    <tr>
    	<td>Password</td>
        <td><input type="password" name="password"> </td>
    </tr>
    <tr>
    	<td>Confirm Password</td>
        <td><input type="password" name="password_ulang"> </td>
    </tr>
    <tr>
    	<td></td>
        <td><input type="submit" name="edit" value="Add Admin"></td>
    </tr>
</table>
</form>