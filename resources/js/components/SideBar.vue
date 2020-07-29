<template>
  <v-col cols="12" sm="3">
    <v-card outlined>
      <v-card-title>カテゴリ一覧</v-card-title>
      <v-card-actions>
        <v-btn depressed small color="primary">カテゴリ作成</v-btn>
      </v-card-actions>
      <v-card-actions>
        <v-btn depressed small color="secondary">カテゴリ編集</v-btn>
      </v-card-actions>
      <v-divider></v-divider>

      <v-list>
        <v-list-item-group>
          <v-list-item>
            <v-list-item-content>あとで見る</v-list-item-content>
          </v-list-item>
          <v-list-item>
            <v-list-item-content>JS参考</v-list-item-content>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-card>
  </v-col>
</template>