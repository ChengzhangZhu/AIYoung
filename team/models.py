from django.db import models
from django.urls import reverse
# Create your models here.

class Publication(models.Model):
    publication_id = models.AutoField(primary_key = True)
    title = models.CharField(max_length = 500, verbose_name = '标题')
    abstract = models.TextField(blank=True, verbose_name = '摘要')
    year = models.IntegerField(verbose_name = '发表年份')
    venue_name = models.CharField(max_length = 500, verbose_name = '期刊/会议名称')
    publication_choice = (('conf','会议'),('jour','期刊'),('patn','专利'))
    publication_type = models.CharField(max_length= 4, choices = publication_choice, verbose_name = '类型')
    authors = models.TextField(verbose_name = '作者')
    volume = models.CharField(max_length = 20,blank=True, verbose_name = '卷号')
    number_v = models.CharField(max_length = 20,blank=True, verbose_name = '刊号')
    page_v = models.CharField(max_length = 20,blank=True, verbose_name = '页码')
    source_code = models.FileField(upload_to='codes/', blank=True, verbose_name = '源码')
    manuscript = models.FileField(upload_to='manuscript/', blank=True, verbose_name = '原文')
    demo_link = models.CharField(max_length = 200, blank=True, verbose_name = '演示页面')
    #staff_id = models.ForeignKey(to=Member, on_delete=models.CASCADE)
    
    def __str__(self):
        return self.title
    class Meta:
        verbose_name_plural='论文'

class Experience(models.Model):
    experience_id = models.AutoField(primary_key=True)
    start_time = models.DateField(verbose_name = '项目开始时间')
    end_time = models.DateField(verbose_name = '项目结束时间')
    experience_name = models.CharField(max_length = 500, verbose_name = '项目名称')
    description = models.TextField(verbose_name = '项目描述')
    main_task = models.TextField(verbose_name = '承担的主要工作')
    #staff_id = models.ForeignKey(to = Member, on_delete=models.CASCADE)
    
    def __str__(self):
        return self.experience_name
    
    class Meta:
        verbose_name_plural='项目'

        

class Member(models.Model):
    staff_id = models.CharField(max_length = 20, primary_key = True, verbose_name = '编号')
    name_en = models.CharField(max_length = 250, verbose_name = '英文名')
    name = models.CharField(max_length = 250, verbose_name = '中文名')
    dob = models.DateField(verbose_name = '出生日期')
    title_choice = (('Mr', 'Mr.'),('Mrs','Mrs.'),('Miss','Miss'),('Dr','Dr.'),('Prof','Prof.'),('A_Prof','A/Prof.'))
    title = models.CharField(max_length = 10, choices = title_choice, default = 'Mr', verbose_name = '头衔')
    email = models.EmailField(verbose_name = '电子邮箱')
    telephone = models.CharField(max_length = 20, blank=True, verbose_name = '电话')
    biograph = models.TextField(blank=True, verbose_name = '个人简历')
    research_interests = models.TextField(verbose_name = '研究点')
    photo = models.ImageField(upload_to='member/img/', verbose_name = '头像照片')
    abstract = models.TextField(blank=True, verbose_name = '个人简介')
    position = models.CharField(max_length = 250, blank=True, verbose_name = '职位')
    # edited by yizheng
    publication_list = models.ManyToManyField(Publication, help_text="Select the publication for this member",blank=True, verbose_name = '论文列表')
    experience_list = models.ManyToManyField(Experience, help_text="Select the experience for this member",blank=True, verbose_name = '项目列表')
    # edited by yizheng

    def get_absolute_url(self):
        return reverse('team:member_detail',
                       args=[self.staff_id])
    def __str__(self):
        return self.name
    
    class Meta:
        verbose_name_plural='个人信息'