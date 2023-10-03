<div class="grid-item category-link">
  <a  class="button button--secondary button--xl"
      href="{{ route('books.category.index', $category->slug) }}"
      >{!! $category->name !!}</a>
</div>