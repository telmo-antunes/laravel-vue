<template>
    <table id="companiesTableComponent" class="table table-bordered table-striped">
        <thead>
            <tr>
                <!-- loop through each value of the fields to get the table header -->
                <th  v-for="field in companyFields" :key='field' > 
                    {{field}} <i class="bi bi-sort-alpha-down" aria-label='Sort Icon'></i>
                </th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through the list get the each student data -->
            <tr v-for="company in companies" :key='item'>
                <td>{{company['id']}}</td>
                <td>{{company['name']}}</td>
                <td><img :src="'http://localhost:8000/storage/' + company['logo']" class="img-fluid" width="200"></td>
                <td>{{company['website']}}</td>
            </tr>
        </tbody>
    </table> 
  </template>
<script>
export default {
  name: 'CompaniesTableComponent',
  props:{
      // 
      companies:{
          type: Array,
      },
      companyFields:{
          type: Array,
      }
  }, 
}
</script>