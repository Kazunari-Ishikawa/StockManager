<template>
  <article>
    <a href class="image">
      <img :src="stock.user.profile_image_url" alt />
    </a>
    <div class="body">
      <ul class="category">
        <v-chip label small color="cyan">あとで見る</v-chip>
      </ul>
      <div class="head">
        <a href>{{ stock.user.id }}</a>
        が{{ this.createDate }}に投稿
      </div>
      <div class="subject">
        <a href>{{ stock.title }}</a>
      </div>
      <ul class="tagList">
        <li class="tagItem">
          <a href class="tagLabel">JavaScript</a>
        </li>
        <li class="tagItem">
          <a href class="tagLabel">promise</a>
        </li>
        <li class="tagItem">
          <a href class="tagLabel">非同期処理</a>
        </li>
      </ul>
    </div>
    <ul class="status">
      <li>LGTM {{ stock.likes_count }}</li>
      <li class="comment">
        <span class="far fa-comment"></span>
        <a href>{{ stock.comments_count }}</a>
      </li>
    </ul>
  </article>
</template>

<script>
export default {
  props: {
    stock: Object,
  },
  computed: {
    createDate() {
      let year = this.stock.created_at.substr(0, 4);
      let month = this.stock.created_at.substr(5, 2);
      let day = this.stock.created_at.substr(8, 2);
      return `${year}/${month}/${day}`;
    },
  },
};
</script>

<style scoped>
article {
  display: flex;
  padding: 10px;
  font-size: 12px;
  border-bottom: 1px solid #ddd;
}
.image {
  width: 48px;
  height: 48px;
  margin-right: 10px;
}
img {
  width: 100%;
  height: 100%;
  vertical-align: middle;
}
.body {
  flex: 1 1;
}
.category {
  display: inline-flex;
  flex-wrap: wrap;
  font-size: 12px;
  align-items: center;
}
.subject {
  display: block;
  margin-bottom: 5px;
  font-size: 16px;
  word-wrap: break-word;
  word-break: break-all;
}
.tagList {
  align-items: center;
  display: inline-flex;
  flex-wrap: wrap;
  font-size: 12px;
}
.tagItem {
  display: flex;
  cursor: pointer;
  padding: 2px 8px;
  margin: 0 10px 5px 5px;
  line-height: 1;
  background: #e0e0e0;
  border-radius: 4px;
  border-left-style: none;
}
.tagItem::before {
  content: "";
  width: 12px;
  height: 12px;
  margin-left: -12px;
  background: #e0e0e0;
  transform: rotate(45deg);
}
.tagLabel {
  z-index: 1;
}
.status {
  font-size: 12px;
}
.comment > span {
  color: #ccc;
}
</style>