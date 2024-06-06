<script setup>
defineProps({customers: Object})

import { router } from '@inertiajs/vue3';

function destroy(id){
    router.delete('/customers/'+id)
}
function edit(id){
    router.get('/customers/'+id+'/edit')
}

</script>

<template>
    <br>
    <div v-if="$page.props.flash.message" class="alert alert-success" role="alert">{{ $page.props.flash.message }}</div>
  <div class="card col-6 offset-3">
    <table class="table table-boardered">
  <thead>
    <tr >
      <th scope="col">Name</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <tr v-for="customer in customers">
      <th scope="row">{{customer.name}}</th>
      <td>
        <button type="button" class="btn btn-outline-info">View</button>
        <button @click.prevent="edit(customer.id)" type="button" class="btn btn-outline-primary">Edit</button>
        <button @click.prevent="destroy(customer.id)" type="button" class="btn btn-outline-danger">Delete</button>
      </td>

    </tr>


  </tbody>
</table>
  </div>
</template>
