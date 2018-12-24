<template>
  <div class="container">
    <div class="row">
      <div class="text-center" v-if="loading">Loading...</div>
      <p class="text-center" v-if="!loading">
        <button class="btn btn-success btn-xs" v-if="status == 0">Add Friend</button>
        <button class="btn btn-success btn-xs" v-if="status == 'pending'">Accept Friend</button>
        <span class="text-success" v-if="status == 'waiting'">Waiting for response</span>
        <span class="text-success" v-if="status == 'friends'">Friends</span>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.$http
      .get("/check_relationship_status/" + this.profile_user_id)
      .then(resp => {
        console.log(resp);
        this.status = resp.body.status;
        this.loading = false;
      });
  },
  props: ["profile_user_id"],
  data() {
    return {
      status: "",
      loading: true
    };
  }
};
</script>
