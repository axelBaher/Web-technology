<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <h2>Вакансии</h2>
        <table border="1">
            <tr bgcolor="#deb5ff">
                <th>Логотип компании</th>
                <th>Название компании</th>
                <th>Должность</th>
                <th>Зарплата</th>
                <th>Опыт работы</th>
                <th>Место работы</th>
            </tr>
            <xsl:for-each select="vacancies/vacancy">
                <tr>
                    <td><img><xsl:attribute name="src"><xsl:value-of select="company_logo"/></xsl:attribute></img></td>
                    <td><xsl:value-of select="company_name"/></td>
                    <td><xsl:value-of select="position"/></td>
                    <td><xsl:value-of select="salary"/></td>
                    <td><xsl:value-of select="experience"/></td>
                    <td><xsl:value-of select="location"/></td>
                </tr>
            </xsl:for-each>
        </table>
    </xsl:template>

</xsl:stylesheet>
