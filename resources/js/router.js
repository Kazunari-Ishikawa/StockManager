import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import StockList from './views/StockList';
import Login from './views/Login';

// ルーティング
const routes = [
  {
    path: '/',
    component: StockList
  },
  {
    path: '/login',
    component: Login
  }
];

// VueRouterインスタンスを作成
const router = new VueRouter({
  mode: 'history',
  routes
});

// VueRouterインスタンスをエクスポート
export default router
