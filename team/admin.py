from django.contrib import admin
from .models import Member, Publication, Experience

# Register your models here.

class MemberAdmin(admin.ModelAdmin):
    list_display = ('staff_id', 'name_en','title','name')
    list_filter = ('title',)
    search_fields = ('name', 'staff_id')
#    prepopulated_fields = {'slug': ('title',)}
#    raw_id_fields = ('author',)
#    date_hierarchy = 'publish'
    ordering = ['staff_id', 'name_en']

    
admin.site.register(Member, MemberAdmin)
admin.site.register(Publication)
admin.site.register(Experience)