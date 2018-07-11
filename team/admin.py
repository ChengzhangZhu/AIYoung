from django.contrib import admin
from .models import Member

# Register your models here.

class MemberAdmin(admin.ModelAdmin):
    list_display = ('staff_id', 'en_name','cn_name', 'position')
    list_filter = ('department','position',)
    search_fields = ('cn_name', 'staff_id')
#    prepopulated_fields = {'slug': ('title',)}
#    raw_id_fields = ('author',)
#    date_hierarchy = 'publish'
    ordering = ['staff_id', 'en_name']

    
admin.site.register(Member, MemberAdmin)
