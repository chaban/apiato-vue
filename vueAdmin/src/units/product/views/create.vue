<template>
  <div class="app-container">
    <el-form ref="form" :model="formData" :rules="rules" label-width="120px">
      
      <el-form-item label="Category">
      <el-select v-model="category" filterable placeholder="Choose category" :loading="dataLoading"
      @change="onCategoryChange">
        <el-option
          v-for="item in categories"
          :key="item.id"
          :label="item.name"
          :value="item.name">
        </el-option>
      </el-select>
      </el-form-item>

      <el-form-item label="Name" prop="name">
        <el-input v-model="formData.name"></el-input>
      </el-form-item>

      <el-form-item label="Price" prop="price">
        <el-input v-model.number="formData.price"></el-input>
      </el-form-item>
      
      <el-form-item label="Description">
        <el-input type="textarea" v-model="formData.desc"></el-input>
      </el-form-item>

      <div>
      <el-form-item label="Attributes"></el-form-item>
      <el-form-item v-for="(attribute, index) in attributes" :key="index">
    <el-col :span="9">
      <span>{{attribute.name}}</span>
    </el-col>
    <el-col class="line" :span="1">-</el-col>
    <el-col :span="8">
      <el-input placeholder="Value" v-model="attribute.value"></el-input>
      <span v-if="!attribute.value" class="el-form-item__error">attribute value can not be null</span>
    </el-col>
    <el-col class="line" :span="1">-</el-col>
    <el-col :span="4">
      <span>{{attribute.suffix}}</span>
    </el-col>
    <el-col class="line" :span="1">
      <a @click.prevent="onRemoveAttribute(index)"><i class="el-icon-close"></i></a>
    </el-col>
  </el-form-item>
  <el-form-item style="float:right">
    <el-button :disabled="!formData.category_id" @click="onAddAttribute()" type="primary">Add attribute</el-button>
  </el-form-item>
  <div class="clearfix"></div>
  </div>

      <el-form-item>
        <el-button type="primary" @click="onSubmit('form')" :loading="dataLoading">Create</el-button>
        <el-button @click="onCancel">Go to list</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
/* eslint-disable */
import {
  createItem,
  rules,
  formData,
  getCategories
} from "@/units/product/service";
export default {
  data() {
    return {
      categories: null,
      category: "",
      attributes: [],
      dataLoading: false,
      formData: formData,
      rules: rules
    };
  },
  created() {
    this.dataLoading = true;
    getCategories()
      .then(res => {
        this.categories = res;
        this.dataLoading = false;
      })
      .catch(() => {
        this.$message({
          type: "info",
          message: "Could not load categories"
        });
        this.dataLoading = false;
      });
  },
  methods: {
    onAddAttribute() {
      this.$router.push(`/categories/edit/${this.formData.category_id}`);
    },
    onRemoveAttribute(index) {
      if (index > -1) {
        this.attributes.splice(index, 1);
      }
    },
    onCategoryChange(value) {
      const temp = this.categories.filter(
        item => (item.name === this.category ? item : null)
      );
      this.formData.category_id = temp[0].id ? temp[0].id : null;
      this.attributes = temp[0].attr ? JSON.parse(temp[0].attr) : [];
    },
    saveData() {
      this.dataLoading = true;
      this.formData.attr = this.attributes;
      createItem(this.formData)
        .then(response => {
          this.formData = response.data;
          this.dataLoading = false;
          this.$message({
            type: "success",
            message: "Created"
          });
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "Not saved"
          });
        });
    },
    onSubmit(formName) {
      let isValid = true;
      if (!this.attributes.length) {
        isValid = false;
      }
      this.attributes.forEach((el, idx) => {
        if (!el.value) {
          this.$message({
            type: "info",
            message: "Please provide attributes"
          });
          isValid = false;
        }
      });
      if (!isValid) {
        return;
      }
      
      this.$refs[formName].validate(valid => {
        if (valid) {
          this.saveData();
        } else {
          return false;
        }
      });
    },
    onCancel() {
      this.$router.push("/products/index");
    }
  }
};
</script>

<style scoped>
.line {
  text-align: center;
}
</style>

