<template>
  <article>
    <a href class="image">
      <img src alt />
    </a>
    <div class="body">
      <div class="head">
        <a href>Test taro</a>が2020/5/15に投稿
      </div>
      <div class="subject">
        <a href>2年目プログラマがQiitaに週一投稿して1年が過ぎました</a>
      </div>
      <ul class="tagList">
        <li class="tagItem">JavaScript</li>
        <li class="tagItem">非同期処理</li>
        <li class="tagItem">promise</li>
      </ul>
    </div>
    <ul class="status">
      <li>LGTM 100</li>
      <li class="comment">
        <span class="far fa-comment"></span>
        <a href>5</a>
      </li>
    </ul>
  </article>
</template>

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
.subject {
  display: block;
  margin-bottom: 5px;
  font-size: 16px;
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
  padding: 0.2em 0.6em;
  margin: 5px;
  background: #e0e0e0;
  border-radius: 4px;
  border-left-style: none;
}
.status {
  font-size: 12px;
}
.comment > span {
  color: #ccc;
}
</style>