<script setup>
defineProps({customers: Object})
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
const form=useForm({
    name:props.customer.name,
    email:props.customer.email,
    phone:props.customer.phone,
})
function submit(id){
    router.put('/customers/'+id,form)
}
</script>

<template>
    <div class="card col-6 offset-3">
  <div class="card-header">
    Edit
  </div>
  <div class="card-body">
    <form @submit.prevent="submit(customer.id)">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="name" id="name" v-model="form.name" class="form-control" aria-describedby="emailHelp">

  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" id="email" v-model="form.email" class="form-control" >
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="number" id="phone" v-model="form.phone" class="form-control" >
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div>
</template>
