<template>
  <div>
    <span v-if="item.category_id == 1">Bildung &amp; Forschung</span>
    <span v-if="item.category_id == 2">Wirtschaft</span>
    <span v-if="item.category_id == 3">Kunst &amp; Kultur</span>
  </div>
</template>

<script>
export default {
  name: "CustomerCategory",
  props: {
    item: {
      required: true,
      type: Object
    }
  }
};
</script>
