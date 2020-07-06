import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import StockList from './views/StockList';

// ルーティング
const routes = [
  {
    path: '/home',
    component: StockList
  }
];

// VueRouterインスタンスを作成
const router = new VueRouter({
  mode: 'history',
  routes
});

// VueRouterインスタンスをエクスポート
export default router
