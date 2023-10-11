<script lang="ts">
import { RouterLink, RouterView } from 'vue-router'
// Importing the table component
import UsersTable from './components/UsersTable.vue'
import CompaniesTable from './components/CompaniesTable.vue'
import axios from 'axios'

export default {
  name: 'App',
    data() {
        return {
            users: [],
            companies: [],
            userFields: ['ID','Name','Company','Email','Phone'],
            companyFields: ['ID','Name','Logo','Website']
        }
    },  
    created() {
        this.getUsers();
        this.getCompanies();
    },
    methods: {
        // ini() 
        getUsers() {
            axios.get("http://localhost:8000/users/getAll").then(response => {
                this.users = response.data;
            });
        },
		
        getCompanies() {
            axios.get("http://localhost:8000/companies/getAll").then(response => {
                this.companies = response.data;
            });
        }
    },
  components: {
    UsersTable,
    CompaniesTable,
  },
}
</script>

<template>
	<section>
  <div class="container text-center mt-5 mb-5">
    <h1 class="mt-5 fw-bolder"> Users List </h1>
    <div class="table-responsive my-5">

      <!-- The table component -->
      <UsersTable :userFields='userFields' :users="users"></UsersTable>
    </div>

</div>
	</section>
	<section>
  <div class="container text-center mt-5 mb-5">
    <h1 class="mt-5 fw-bolder"> Companies List </h1>
    <div class="table-responsive my-5">

      <!-- The table component -->
      <CompaniesTable :companyFields='companyFields' :companies="companies"></CompaniesTable>
    </div>

</div>
	</section>
</template>

<style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style>
