<template lang="">
  <div class="space-y-10">
    <router-link :to="{ name: 'GoodsEdit' }">
      <Btn :isInfo="true" class="w-[200px]">Добавить</Btn>
    </router-link>
    <Btn class="ml-4" @click="clearFilter" :isDanger="true">Очистить фильтр</Btn>
    <Table
      :onClickEdit="onClickEdit"
      :onClickRemove="onClickRemove"
      :tableHeaders="tableHeaders"
      :filterForCat="filterForCat"
      :items="items"
    />
  </div>
</template>
<script>
import Table from './Table.vue';
import Btn from './Btn.vue';
import { useStore } from 'vuex';
import { computed, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import { fetchItems, selectItems, removeItem } from '@/store/goods/service';
export default {
  name: 'GoodsList',
  components: {
    Table,
    Btn,
  },
  methods: {},
  setup() {
    const store = useStore();
    const router = useRouter();
    onMounted(() => {
      fetchItems(store);
    });
    return {
      items: computed(() => selectItems(store)),
      tableHeaders: [
        { value: 'id', text: 'ID' },
        { value: 'name', text: 'Название' },
        { value: 'description', text: 'Описание' },
        { value: 'category', text: 'Категория' },
        { value: 'price', text: 'Цена' },
      ],
      onClickRemove: (id) => {
        const isConfirmRemove = confirm('Вы действительно хотите удалить запись?');
        if (isConfirmRemove) {
          removeItem(store, id);
        }
      },
      onClickEdit: (id) => {
        console.log(id);
        router.push({ name: 'GoodsEdit', params: { id } });
      },
      filterForCat: (items, category) => {
        store.commit(
          'goods/setFilteredItems',
          items.filter((item) => item.category === category),
        );
      },
      clearFilter: () => {
        store.commit('goods/setFilteredItems', []);
      },
    };
  },
};
</script>
<style lang=""></style>
