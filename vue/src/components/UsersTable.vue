<template>
    <table id="usersTableComponent" class="table table-bordered table-striped">
        <thead>
            <tr>
                <!-- loop through each value of the fields to get the table header -->
                <th  v-for="field in userFields" :key='field' > 
                    {{field}} <i class="bi bi-sort-alpha-down" aria-label='Sort Icon'></i>
                </th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through the list get the each student data -->
            <tr v-for="user in users" :key='item'>
                <td>{{user['id']}}</td>
                <td>{{user['first_name'] + ' ' + user['last_name']}}</td>
                <td>{{user['company']['name']}}</td>
                <td>{{user['email']}}</td>
                <td>{{user['phone']}}</td>
            </tr>
        </tbody>
    </table> 
  </template>
<script>
export default {
  name: 'UsersTableComponent',
  props:{
      // 
      users:{
          type: Array,
      },
      userFields:{
          type: Array,
      }
  }, 
}
</script>