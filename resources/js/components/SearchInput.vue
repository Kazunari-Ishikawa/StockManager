<template>
  <form action class="c-searchForm--sm">
    <span class="fa fa-search"></span>
    <input type="text" placeholder="キーワードを入力" id="searchInput" />
  </form>
</template>

<script>
export default {};
</script>

<style scoped>
.c-searchForm--sm {
  width: 200px;
  position: relative;
  display: flex;
  align-items: center;
  margin-left: 10px;
}
.c-searchForm--sm > input {
  width: 100%;
  height: 32px;
  background: white;
  border: none;
  border-radius: 4px;
  padding: 5px;
  padding-left: 30px;
  font-size: 12px;
}
.c-searchForm--sm > span {
  color: #aaa;
  position: absolute;
  left: 8px;
}
</style>